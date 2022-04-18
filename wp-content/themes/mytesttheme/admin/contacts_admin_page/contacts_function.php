<?php

create_contacts_table();

function create_contacts_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'contacts';
	$charset_collate = $wpdb->get_charset_collate();

    if($table_name === $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) return;

	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	field_name varchar(100) NOT NULL default '',
	field_content varchar(1000) NOT NULL default '',
	PRIMARY KEY  (id),
	UNIQUE field_name (field_name)
	)
	{$charset_collate};";

	dbDelta($sql);

    $wpdb->insert($table_name, ['field_name'=>'title']);
    $wpdb->insert($table_name, ['field_name'=>'phone']);
    $wpdb->insert($table_name, ['field_name'=>'email']);
    $wpdb->insert($table_name, ['field_name'=>'whatsapp']);
    $wpdb->insert($table_name, ['field_name'=>'skype']);
    $wpdb->insert($table_name, ['field_name'=>'full_name']);
    $wpdb->insert($table_name, ['field_name'=>'TIN']);
    $wpdb->insert($table_name, ['field_name'=>'IEC']);
    $wpdb->insert($table_name, ['field_name'=>'PSRN']);
    $wpdb->insert($table_name, ['field_name'=>'address']);
}

function update_field_content_from_contacts_tbl($field_contant, $field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . "contacts";

    $current_value = get_field_content_from_contacts_tbl($field_name);

    if($current_value === $field_contant) return;
    $wpdb->update($table_name, ['field_content'=>"$field_contant"],["field_name"=>"$field_name"]);
}

if(isset($_POST['contacts']['title'])) update_field_content_from_contacts_tbl($_POST['contacts']['title'], "title");
if(isset($_POST['contacts']['phone'])) update_field_content_from_contacts_tbl($_POST['contacts']['phone'], "phone");
if(isset($_POST['contacts']['email'])) update_field_content_from_contacts_tbl($_POST['contacts']['email'], "email");
if(isset($_POST['contacts']['whatsapp'])) update_field_content_from_contacts_tbl($_POST['contacts']['whatsapp'], "whatsapp");
if(isset($_POST['contacts']['skype'])) update_field_content_from_contacts_tbl($_POST['contacts']['skype'], "skype");
if(isset($_POST['contacts']['name'])) update_field_content_from_contacts_tbl($_POST['contacts']['name'], "full_name");
if(isset($_POST['contacts']['TIN'])) update_field_content_from_contacts_tbl($_POST['contacts']['TIN'], "TIN");
if(isset($_POST['contacts']['IEC'])) update_field_content_from_contacts_tbl($_POST['contacts']['IEC'], "IEC");
if(isset($_POST['contacts']['PSRN'])) update_field_content_from_contacts_tbl($_POST['contacts']['PSRN'], "PSRN");
if(isset($_POST['contacts']['address'])) update_field_content_from_contacts_tbl($_POST['contacts']['address'], "address");




function get_field_content_from_contacts_tbl($field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . "contacts";
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $field_content = $wpdb->get_var($request);
    $field_content = wp_unslash($field_content);
    return $field_content;
}


function get_contacts_clb_title() {
    $title = get_field_content_from_contacts_tbl("title");
    $title = esc_attr($title);
    return print($title);
}

function get_contacts_clb_phone() {
    $phone = get_field_content_from_contacts_tbl("phone");
    $phone = esc_attr($phone);
    return print($phone);
}

function get_contacts_clb_email() {
    $email = get_field_content_from_contacts_tbl("email");
    $email = esc_attr($email);
    return print($email);
}
function get_contacts_clb_whatsapp() {
    $whatsapp = get_field_content_from_contacts_tbl("whatsapp");
    $whatsapp = esc_attr($whatsapp);
    return print($whatsapp);
}
function get_contacts_clb_skype() {
    $skype = get_field_content_from_contacts_tbl("skype");
    $skype = esc_attr($skype);
    return print($skype);
}
function get_contacts_clb_full_name() {
    $full_name = get_field_content_from_contacts_tbl("full_name");
    $full_name = esc_attr($full_name);
    return print($full_name);
}
function get_contacts_clb_TIN() {
    $TIN = get_field_content_from_contacts_tbl("TIN");
    $TIN = esc_attr($TIN);
    return print($TIN);
}
function get_contacts_clb_IEC() {
    $IEC = get_field_content_from_contacts_tbl("IEC");
    $IEC = esc_attr($IEC);
    return print($IEC);
}
function get_contacts_clb_PSRN() {
    $PSRN = get_field_content_from_contacts_tbl("PSRN");
    $PSRN = esc_attr($PSRN);
    return print($PSRN);
}
function get_contacts_clb_address () {
    $address = get_field_content_from_contacts_tbl("address");
    $address = esc_attr($address);
    return print($address);
}


?>