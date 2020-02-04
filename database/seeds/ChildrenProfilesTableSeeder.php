<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('children_profiles')->delete();
        DB::table('children_profiles')->insert([
           [
               'id'             =>1,
               'first_name'     =>'Beatriz',
               'last_name'      =>'Cena',
               'birthday'       =>'2010-10-10',
               'blood_group'    =>'A',
               'gender'         =>1,
               'date_of_joining'=>'2012-02-03',
               'unique_id'      =>'2F45H76GAV89',
               'address'        =>'Washington DC',
               'allergies'      =>'none',
               'additional_note'=>'none',
               'image'          =>'Child.png',
               'status'         =>1,
               'exist'          =>1,
               
           ],
            [
                'id'             =>2,
                'first_name'     =>'mike',
                'last_name'      =>'tom',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'B',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'2FSDF45FDF89',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>3,
                'first_name'     =>'TOM',
                'last_name'      =>'JERRY',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'34GF63FDF',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>4,
                'first_name'     =>'TIM',
                'last_name'      =>'YAN',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'45GFG343YY',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>5,
                'first_name'     =>'HEELO',
                'last_name'      =>'Charles',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'GDDWDS34SDD',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>6,
                'first_name'     =>'FACEBOOK',
                'last_name'      =>'Diya',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'65HGJ87FD',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>7,
                'first_name'     =>'Eric',
                'last_name'      =>'Laura',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'3534FSDSADS54',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>8,
                'first_name'     =>'Fatima',
                'last_name'      =>'Gabriel',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'ASD2323FDF',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>9,
                'first_name'     =>'NICE',
                'last_name'      =>'Cena',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'546GFSV5XC',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
            [
                'id'             =>10,
                'first_name'     =>'Alison',
                'last_name'      =>'Michael',
                'birthday'       =>'2010-10-10',
                'blood_group'    =>'A',
                'gender'         =>1,
                'date_of_joining'=>'2012-02-03',
                'unique_id'      =>'ACXV63H76SD',
                'address'        =>'Washington DC',
                'allergies'      =>'none',
                'additional_note'=>'none',
                'image'          =>'Child.png',
                'status'         =>1,
                'exist'          =>1,
                
            ],
        ]);
    }
}
