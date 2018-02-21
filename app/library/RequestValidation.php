<?php


namespace App\library;

use Validator;
use Illuminate\Http\Request;


class RequestValidation
{


	private $request;
	private $Validator;
	private $request_array;

    private $message;
    private $result;

	public function __construct($request)
	{
		$this->request       = $request;
        
        $this->request_array = $request->all();
	}

    public function run(){

      //  $module = \App\Module::find('4');
        //return $module;
    }

	private function request_to_array($request)
	{

	}

	private function extractData($request)
    {

    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRequestArray()
    {
        return $this->request_array;
    }


    public function setRequestArray($request_array)
    {
        $this->request_array = $request_array;
    }



    public function required($field)
    {

        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'required']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'required';
    
            $this->result[] = $var;
            return $var; 
            //$this->message .= $field->name.' required|';
            
        }

    }

    public function email($field)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'email']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'is not in email format';
    
            $this->result[] = $var;
            return $var;
            
        }
    }

    public function numeric($field)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'numeric']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'needs to be numeric';
    
            $this->result[] = $var;
            return $var;
            
        }   
    }

    public function integer($field)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'integer']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'needs to be an integer';
    
            $this->result[] = $var;

            
        }
        
    }

    public function alnum($field)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'alpha_num']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'needs to be in alphanumeric format';
            
            $this->result[] = $var;

            return $var;
            
        }
        
    }

    public function passwordConfirm($field)
    {

        // The field under validation must have a matching field of foo_confirmation. For example, if the field under validation is  password, a matching password_confirmation field must be present in the input.




        $validator = Validator::make(//you need to pass password confirmation here
                                    [$field->name  => $this->request_array[$field->name], $field->name.'_confirmation' => $this->request_array[$field->name.'_confirmation'] ],
                                    [$field->name => 'confirmed']
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'doesnt match confirmation password';
            
            $this->result[] = $var;

            return $var;
            
        }

    }

    public function stringLength($field, $min, $max)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'min:'.$min.'|'.'max:'.$max]
                                );
        if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'needs to be between '.$min.' & '.$max.' characters long';
            
            $this->result[] = $var;
            return $var;

            
        }
    }

    public function file($field, $max_size)
    {
        $validator = Validator::make(
                                    [$field->name  => $this->request_array[$field->name] ],
                                    [$field->name => 'max:'.$max_size]
                                );
            //dd(json_encode($this->request->hasFile('file')));
            if($validator->fails()){
            //ADD MESSAGE
            $var['field'] = $field->name;
            $var['message'] = 'file exceeds '.$max_size.' kilobytes';
            $this->result[] = $var;
            return $var;
        }        
    }


    public function validate()
    {

        //remove csrf
        //if(isset($this->request_array['_token'])){
        unset($this->request_array['_token']);
        //}
       
        $module_id = $this->request_array['module'];
        unset($this->request_array['module']);

        $module = \App\Module::find($module_id);

        if($module == NULL){
            return 'wrong module';
        }

        $fields = $module->fields;
        // handle validation logic
        $keys = array_keys($this->request_array);//correspond to fields

        $str = ' ';        
        

        foreach($fields as $field){
            
            //$validation = $field->validation;
                
                if(in_array($field->name,$keys, true)){
        
                    foreach($field->validations as $fl_validation){

                        if($fl_validation->name === 'required'){
                            $this->required($field);

                        }
                        if($fl_validation->name === 'passwordConfirm'){
                            $this->passwordConfirm($field);
                        }
                        if($fl_validation->name === 'integer'){
                            $this->integer($field);
                        }
                        if($fl_validation->name === 'numeric'){
                            $this->numeric($field);
                        }
                        if($fl_validation->name === 'alnum'){//alpha numeric
                            $this->alnum($field);
                        }
                        if($fl_validation->name === 'email'){
                            $this->email($field);
                        }
                        if($fl_validation->name === 'file'){
                            $this->file($field, 500);
                        }
                        if($fl_validation->name === 'stringlength'){
                            $this->stringLength($field, 6, 12);
                        }
                    
                    }
                }
                
           
        }


        return $this->result;
    }

    protected function structureValidationErrorMessages($validation_result)
    {
        // structure the validation error messages

    }
 	

}
