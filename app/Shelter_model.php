<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Shelter_model
{
    public static function allPets(){
    	$query="SELECT name,id,status,image
    			FROM pets";
    	$pets= DB::select($query);
    	return $pets;
    }

    public static function pets($cat_id){
    	$query="SELECT name,id,status,image
    			FROM pets
    			WHERE cat_id='$cat_id'";
    	$pets= DB::select($query); 
    	return $pets;
    }	

    public static function categories(){
    	$query="SELECT name,id
    			FROM petcategories";
    	$cat= DB::select($query); 
    	return $cat;
    }

    public static function check_email($Email){
        $email="SELECT * FROM petlovers where email='$Email'";
        $query=DB::select($email);
        return $query;
    }

    public static function register_user($Username,$Email,$pwdHash){
        $newUser="INSERT INTO petlovers(name,email,password_digest,created_at,updated_at)
        VALUES ('$Username','$Email','$pwdHash',NOW(),NOW())";
        DB::insert($newUser);
    }

    public static function validate_user($Email,$pwdHash){
        $pass="SELECT * FROM petlovers where email = '$Email' AND password_digest='$pwdHash'";
        $query=DB::select($pass);
        return $query;
    }

    public static function adoptPet($pet_id,$petlover_id){
    	$query="UPDATE pets
    			SET status='1' 
    			WHERE id='$pet_id'";

    	$query2="INSERT INTO adoptions(petlover_id,pet_id,created_at)
    			VALUES ('$petlover_id','$pet_id',NOW())";
    	DB::update($query);
    	DB::insert($query2);
    }

    public static function getPetStatus($pet_id){
    	$query="SELECT status
    			FROM pets 
    			WHERE id='$pet_id'";
    	$sql=DB::select($query);
    	return $sql;
    }

    public static function myPets($petlover_id){
    	$query="SELECT pets.name,pets.image,pets.description,adoptions.created_at
    			FROM adoptions,pets
    			WHERE adoptions.petlover_id='$petlover_id' AND adoptions.pet_id=pets.id";
    	$sql=DB::select($query);
    	return $sql;	
    }

}
