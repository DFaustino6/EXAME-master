<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shelter_model;

class Shelter extends Controller
{
    public function index(){
    	return view('index');
    }

    public function pets($cat_id=null){

    	$categories=Shelter_model::categories();
    	$cat_name=$categories[0]->name.' & '.$categories[1]->name;

    	if(isset($cat_id)){
    		$pets=Shelter_model::pets($cat_id);
    		$cat_name= $categories[$cat_id-1]->name;
    	}	
    	else		
    		$pets=Shelter_model::Allpets();

    	if(session()->has('id')){
	    	$values = array(
	    		'Menu1' => 'Welcome'.' '.session()->get('name'),
	    		'Menu2' => 'Logout',
	    		'href0' => action('Shelter@mypets'), 
	    		'href1' => '#', 
	    		'href2' => action('Shelter@logout'),  
	    		'pets' => $pets,
	    		'categories' => $categories,
	    		'petlover_id' => session()->get('id'),
	    		'cat_name' => $cat_name
	    	);
	    }
	    else{
	    	$values = array(
	    		'Menu1' => 'Register',
	    		'Menu2' => 'Login',
	    		'href0' => '#', 
	    		'href1' => action('Shelter@register'), 
	    		'href2' => action('Shelter@login'), 
	    		'pets' => $pets,
	    		'categories' => $categories,
	    		'petlover_id' => session()->get('id'),
	    		'cat_name' => $cat_name
	    	);
	    }

    	return view('pets',$values);
    }

    public function register(){
        return view('register');
    }

    public function register_action(Request $request){
        $values = array(
            'Msg' => 'Registration Sucessfully!',
            'href0' => action('Shelter@pets')
         );

        $Username=$request->Username;
        $Email=$request->Email;
        $pwdHash=substr(md5($request->Pwd),0,32);
        $nrows=Shelter_model::check_email($request->Email);

        if(count($nrows)>0)
            return redirect('home/register')->withErrors('Email já existe na base de dados')->withInput($request->except('Email'));
        elseif($request->Pwd!=$request->ConfPwd)
            return redirect('home/register')->withErrors('Passwords não coincidem')->withInput();
        else{
            Shelter_model::register_user($Username,$Email,$pwdHash);
            return view('message',$values);
        }     
    }

    public function login(){ 
        return view('login');
    }

    public function login_action(Request $request){
      $values = array(
            'Msg' => 'Welcome back!',
            'href0' => action('Shelter@pets')
         );
        
        $pwdHash=substr(md5($request->Pwd),0,32);
        $nrows=Shelter_model::validate_user($request->Email,$pwdHash);
        if(count($nrows)>0){
            session()->regenerate();
            session(['name' => $nrows[0]->name]);
            session(['id' => $nrows[0]->id]);
            return view('message',$values); 
        }   
         
        else 
            return redirect('home/login')->withErrors('Wrong email or password.'); 
    }

     public function logout(){
        session()->flush();
        $values = array(
        	'Msg' => 'See you soon!',
        	'href0' => action('Shelter@pets')
         ); 
 
        return view('message',$values);
    }

     public function adopt($pet_id){

     	$status=Shelter_model::getPetStatus($pet_id);
	
     	if(session()->has('id') && $status[0]->status==0)
    		Shelter_model::adoptPet($pet_id,session()->get('id'));
    	else if(!session()->has('id')){
    		$values = array(
	        	'Msg' => 'Login first to adopt!',
	        	'href0' => action('Shelter@pets')
         	); 
    		return view('message',$values);
    	}
    	else if($status[0]->status==1){
    		$values = array(
	        	'Msg' => 'Already adopted!',
	        	'href0' => action('Shelter@pets')
         	);
         	return view('message',$values); 
    	}
    	

        return redirect()->back();
    }

    public function mypets(){
    	$categories=Shelter_model::categories();
    	$myAdoptions=Shelter_model::myPets(session()->get('id'));
    	$values = array(
	    		'Menu1' => 'Welcome'.' '.session()->get('name'),
	    		'Menu2' => 'Logout', 
	    		'href1' => '#', 
	    		'href2' => action('Shelter@logout'),  
	    		'myAdoptions' => $myAdoptions,
	    		'categories' => $categories,
	    	);
    	return view('mypets',$values);
	
    }
}
