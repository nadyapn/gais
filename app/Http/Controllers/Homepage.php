<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Homepage extends Controller {

    public function index() {
        return view('welcome', array('page' => 'welcome'));
    }

    public function dashboard() {
        return view('user/dashboard', array('page' => 'dashboard'));
    }
	public function create() {
        return view('user/create', array('page' => 'create'));
        //return \View::make('user/create');
    }

    Public function dashboardNonAdmin() {
        return view('user/dashboardNonAdmin', array('page' => 'dashboardNonAdmin'));
    }
	Public function dashboardAdmin() {
        return view('dashboardAdmin', array('page' => 'dashboardAdmin'));
    }
	Public function homepageGAIS() {
        return view('user/homepageGAIS', array('page' => 'homepageGAIS'));
    }
	Public function viewReimburse() {
        return view('viewReimburse', array('page' => 'viewReimburse'));
    }
	Public function viewOvertime() {
        return view('viewOvertime', array('page' => 'viewOvertime'));
    }
	Public function viewPaidLeave() {
        return view('viewPaidLeave', array('page' => 'viewPaidLeave'));
    }
	Public function viewDetailsReimburse() {
        return view('viewDetailsReimburse', array('page' => 'viewDetailsReimburse'));
    }
	Public function viewDetailsOvertime() {
        return view('viewDetailsOvertime', array('page' => 'viewDetailsOvertime'));
    }
	Public function viewDetailsPaidLeave() {
        return view('viewDetailsPaidLeave', array('page' => 'viewDetailsPaidLeave'));
    }
	Public function createReimburse() {
        return view('createReimburse', array('page' => 'createReimburse'));
    }
	Public function createOvertime() {
        return view('createOvertime', array('page' => 'createOvertime'));
    }
	Public function createPaidLeave() {
        return view('createPaidLeave', array('page' => 'createPaidLeave'));
    }
	Public function adminViewReimburse() {
        return view('adminViewReimburse', array('page' => 'adminViewReimburse'));
    }
	Public function adminViewOvertime() {
        return view('adminViewOvertime', array('page' => 'adminViewOvertime'));
    }
	Public function adminViewPaidLeave() {
        return view('adminViewPaidLeave', array('page' => 'adminViewPaidLeave'));
    }
}