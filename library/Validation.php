<?php

class Validation {

    public $errors = array();
    private $validation_rules = array();
    public $sanitized = array();
    private $source = array();
    private $isValid = false;

    public function __construct() {
        
    }

    /*
     * @add te source
     * @paccess public
     * @param array $source
     */

    public function addSource($source) {
        $this->source = $source;
    }

    /*
     * @run the validation rules
     * @access public
     */

    public function run() {
        /*
         * Set the vars
         */
        if (!array_diff_key($this->validation_rules, $this->source)) {
            foreach (new ArrayIterator($this->validation_rules) as $var => $opt) {
                if ($opt['required'] == true) {
                    $this->is_set($var);
                }

                /* Trim whitespace from beginning and end of variable */
                if (array_key_exists('trim', $opt) && $opt['trim'] == true) {
                    $this->source[$var] = trim($this->source[$var]);
                }

                switch ($opt['type']) {
                    case 'email':
                        $this->validateEmail($var, $opt['required']);
                        if(!array_key_exists($var, $this->errors) && array_key_exists('exists', $opt)){
                            $this->validateExists($var,$this->source[$var], $var ,$opt['exists']);
                            $this->sanitizedString($var);
                        }
                        break;

                    case 'url':
                        $this->validateUrl($var);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitizedUrl($var);
                        }
                        break;

                    case 'numeric':
                        
                        $this->validateNumeric($var, $opt['min'], $opt['max'], $opt['required']);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitizedNumeric($var);
                        }
                        break;
                    case 'string':
                        $this->validateString($var, $opt['min'], $opt['max'], $opt['required']);
                        if(!array_key_exists($var, $this->errors) && array_key_exists('exists', $opt)){
                            $this->validateExists($var,$this->source[$var], $var ,$opt['exists']);
                            $this->sanitizedString($var);
                        }
                        break;

                    case 'float':
                        $this->validateFloat($var, $opt['required']);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitizeFloat($var);
                        }
                        break;

                    case 'ipv4':
                        $this->validateIpv4($var, $opt['required']);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitizeIpv4($var);
                        }
                        break;

                    case 'ipv6':
                        $this->validateIpv6($var, $opt['required']);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitizeIpv6($var);
                        }
                        break;

                    case 'bool':
                        $this->validateBool($var, $opt['required']);
                        if (!array_key_exists($var, $this->errors)) {
                            $this->sanitized[$var] = (bool) $this->source[$var];
                        }
                        break;
                    case 'equals':
                        $this->validateEquals($var, $opt['key']);
                        break;
                    case 'exists':
                        $this->validateExists($var, $opt[$var], $opt['name'], $opt['table']);
                        break;
                    case 'select':
                        $this->validateSelect($var, $opt['required']);
                        break;
                        
                }
            }
        }else{
            $this->errors['diff_key'] = true;
        }
    }

    /*
     * @add a rule to the validation rules array
     * @access public
     * @param string $varname The variable name
     * @param string $type The type of variable
     * @param bool $required If the field is required
     * @param int $min The minimum length or range
     * @param int $max The maximum length or range
     */

    public function addRule($varname, $type, $required = false, $min = 0, $max = 0, $trim = false) {
        $this->validation_rules[$varname] = array('type' => $type, 'required' => $required, 'min' => $min, 'max' => $max, 'trim' => $trim);
        /*         * * Allow chaining ** */
        return $this;
    }

    /*
     * @add multiple rules to the validation rules array
     * @access public
     * @param array $rules_array The array of rules to add
     */

    public function addRules(array $rules_array) {
        $this->validation_rules = array_merge($this->validation_rules, $rules_array);
    }

    /*
     * @Check if POST variable is set
     * @access private
     * @param string $var The POST variable to check
     */

    private function is_set($var) {
        if (!isset($this->source[$var])) {
            $this->errors[$var] = ' không được bỏ trống';
        }
    }

    /*
     * @validate an ipv4 IP address
     * @access private
     * @param string $var The variable name
     * @param bool $required
     */

    private function validateIpv4($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === FALSE) {
            $this->errors[$var] = " không phải là một IPv4";
        }
    }

    /*
     * @validate an ipv6 IP address
     * @access private
     * @param string $var The variable name
     * @param bool $required
     */

    private function validateIpv6($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === FALSE) {
            $this->errors[$var] = " không phải là một IPv6";
        }
    }

    /*
     * @validate a floating point number
     * @access private
     * @param $var The variable name
     * @param bool $required
     */

    private function validateFloat($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_FLOAT) === FALSE) {
            $this->errors[$var] = " không phải là số thực";
        }
    }

    /*
     * @validate a string
     * @access private
     * @param string $var The variable name
     * @param int $min the minimum string length
     * @param int $max The maximum string length
     * @param bool $required
     */

    private function validateString($var, $min = 0, $max = 0, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (isset($this->source[$var])) {
            if (strlen($this->source[$var]) < $min) {
                $this->errors[$var] = " quá ngắn phải lớn hơn {$min} kí tự";
            } elseif (strlen($this->source[$var]) > $max) {
                $this->errors[$var] = " quá dài chỉ được nhỏ hơn {$max} kí tự";
            } elseif (!is_string($this->source[$var])) {
                $this->errors[$var] = " không phải là một chuỗi";
            }
        }
    }

    /*
     * @validate an number
     * @access private
     * @param string $var the variable name
     * @param int $min The minimum number range
     * @param int $max The maximum number range
     * @param bool $required
     */

    private function validateNumeric($var, $min = 0, $max = 0, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === FALSE) {
            $this->errors[$var] = " không hợp lệ. Phải là số từ {$min} tới {$max}";
        }
    }

    /*
     * @validate an email address
     * @access private
     * @param string $var The variable name
     * @param bool $required
     */

    private function validateEmail($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }

        if (filter_var($this->source[$var], FILTER_VALIDATE_EMAIL) === FALSE) {
            $this->errors[$var] = " không phải đúng định dạng";
        }
    }

    /*
     * @validate a boolean
     * @access private
     * @param string $var the variable name
     * @param bool $required
     *
     */

    private function validateBool($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }

        if (filter_var($this->source[$var], FILTER_VALIDATE_BOOLEAN) === FALSE) {
            $this->errors[$var] = " không chính xác";
        }
    }

    /*
     * @validate a url
     * @access private
     * @param string $var The variable name
     * @param bool $required
     *
     */

    private function validateUrl($var, $required = false) {
        if ($required == false && strlen($this->source[$var]) == 0) {
            return;
        }
        if (filter_var($this->source[$var], FILTER_VALIDATE_URL) === FALSE) {
            $this->errors[$var] = ' không phải là một địa chỉ URL';
        }
    }
    
    
    private function validateEquals($var1, $var2){
        if($this->source[$var1] != $this->source[$var2]){
            $this->errors[$var1] = ' không trùng nhau.';
        }
    }
    
    private function validateExists($var, $value, $name , $table){
        $exists = new CheckExists();
        if($exists->check($value, $name, $table)){
            $this->errors[$var] = ' đã tồn tại';
        }
    }
    
    private function validateSelect($var, $required){
        if ($required == false) {
            return;
        }
        
        if($this->source[$var] == ""){
            $this->errors[$var] = 'Bạn phải lựa chọn một giá trị.';
        }
    }

    ########## SANITIZING METHODS ############
    /*
     * @santize and email
     * @access private
     * @param string $var The variable name
     * @return string
     */

    private function sanitizedEmail($var) {
        $email = preg_replace('((?:\n|\r|\t|%0A|%0D|%08|%09)+)i', '', $this->source[$var]);
        $this->sanitized[$var] = (string) filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /*
     * @sanitize a url
     * @access private
     * @param string $var The variable name
     */

    private function sanitizedUrl($var) {
        $this->sanitized[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_URL);
    }

    /*
     * @sanitize a numeric value
     * @access private
     * @param string $var The variable name
     */

    private function sanitizedNumeric($var) {
        $this->sanitized[$var] = (int) filter_var($this->source[$var], FILTER_SANITIZE_NUMBER_INT);
    }

    /*
     * @sanitize a string
     * @access private
     * @param string $var The variable name
     */

    private function sanitizedString($var) {
        $this->sanitized[$var] = (string) filter_var($this->source[$var], FILTER_SANITIZE_STRING);
    }

    /*
     * @sanitize a string
     * @access private
     * @param string $var The variable name
     */

    private function sanitizeFloat($var) {
        $this->sanitized[$var] = (float) filter_var($this->source[$var], FILTER_SANITIZE_NUMBER_FLOAT);
    }

    /*
     * @sanitize a string
     * @access private
     * @param string $var The variable name
     */

    private function sanitizeIpv4($var) {
        $this->sanitized[$var] = filter_var($this->source[$var], FILTER_SANITIZE_STRING);
    }

    /*
     * @sanitize a string
     * @access private
     * @param string $var The variable name
     */

    private function sanitizeIpv6($var) {
        $this->sanitized[$var] = filter_var($this->source[$var], FILTER_SANITIZE_STRING);
    }

    /*
     * access public
     */

    public function isValid() {
        if (count($this->errors) == 0) {
            $this->isValid = true;
        }
        return $this->isValid;
    }

    /*
     * access private
     * @param array of label
     */

    public function changeLabel(array $label) {
        foreach ($label as $key => $value) {
            if (array_key_exists($key, $this->errors)) {
                $this->errors[$key] = $value . $this->errors[$key];
            }
        }
    }

    public function alertErrorField($key) {
        if (isset($this->errors) && array_key_exists($key, $this->errors)) {
            echo '<span for="textfield" class="help-block error">' . $this->errors[$key] . '</span>';
        }
    }

}