<?php

use App\Models\MemberType;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\Auth;

function formatRupiah($angka, $text = true){
	return ($text ? "Rp " : '') . number_format($angka,0,',','.');
}

function headerContent() {
    $data = [
        "member_type" => MemberType::where("name", "!=", "Kemenprim")->paginate(5),
        "meta_blog" => MetaBlogCategory::where("is_approved", 1)->paginate(5)
    ];

    return $data;
}

function limitText($content = false, $limit = false, $stripTags = true, $ellipsis = true) 
{
    if ($content && $limit) {
        $content = ($stripTags ? strip_tags($content) : $content);
        $content = explode(' ', $content, $limit+1);
        array_pop($content);
        if ($ellipsis) {
            array_push($content, '...');
        }
        $content = implode(' ', $content);
    }
    return $content;
}

function limitString($content = false, $limit = false, $stripTags = true, $ellipsis = true) 
{
    if ($content && $limit) {
        $content = ($stripTags ? strip_tags($content) : $content);
        if (strlen($content) > $limit){
            $content = substr($content, 0, $limit);
            if ($ellipsis) {
                $content .= '...';
            }
        }
    }
    
    return $content;
}

function filterNumber($string){
    return  preg_replace('/[^0-9]+/', '', $string);
}

function dateFormat($date){
    return date('Y-m-d', strtotime($date));
}

function urlCheck($url){
    if(!$url)
        return 'javascript:void(0)';

    if(!filter_var($url, FILTER_VALIDATE_URL))
        return '//'.$url;
        
    return $url;
}

function getError($errors){
    $error = "";
    foreach($errors as $item){
        $error .= $item.'<br>';
    }

    return $error;
}

function monthArray($locale = 'id', $isSlug = false)
{
    if($locale == 'id'){
        $month = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        if($isSlug) $month = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agst','Sept','Okt','Nov','Des'];
    }
    else{
        $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        if($isSlug) $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
    }

    $data = [];
    $i = 1;
    foreach($month as $item){
        $data[] = [
            'name'  => $item,
            'code'  => $i >= 10 ? $i : '0'.$i,
            'value' => 0
        ];
        $i++;
    }

    return $data;
}

function getRoleName(){
    return Auth::user()->getRoleNames()->first();
}


function isAutoApprove()
{
    $isAutoApprove = getRoleName() == 'admin' ? true : false;

    if(getRoleName() != 'admin'){
        $isAutoApprove = Auth::user()->member->member_type->name == 'Technopark' ? true : false;
    }

    return $isAutoApprove;
}
