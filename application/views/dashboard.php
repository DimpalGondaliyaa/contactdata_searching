<?php 

@$con=mysqli_connect('localhost','root','','contactsdata');
/*if(@$con){
	echo "Connected Succesfully.";
}*/

?>
<div class="mainBox">
	<div class="row">
<?php

//session_start();

//include google api library
require_once 'import/google-api-php-client/src/Google/autoload.php';// or wherever autoload.php is located


//Create a Google application in Google Developers Console for obtaining your Client id and Client secret.
// https://www.design19.org/blog/import-google-contacts-with-php-or-javascript-using-google-contacts-api-and-oauth-2-0/

// Your redirect uri should be on a online server. Localhost will not work.

//Important : Your redirect uri should be added in Google Developers Console , in your Authorized redirect URIs

//Declare your Google Client ID, Google Client secret and Google redirect uri in  php variables
$google_client_id = '90773932518-6pfq3q89fo8pemprm5e7cus9daof0od3.apps.googleusercontent.com';
$google_client_secret = 'RZOZp1g9lj89ortxj17YPR1R';
$google_redirect_uri = base_url().'Dashboard';



//setup new google client
$client = new Google_Client();
$client -> setApplicationName('My application name');
$client -> setClientid($google_client_id);
$client -> setClientSecret($google_client_secret);
$client -> setRedirectUri($google_redirect_uri);
$client -> setAccessType('online');
$client -> setScopes('https://www.google.com/m8/feeds');
$googleImportUrl = $client -> createAuthUrl();


//curl function
function curl($url, $post = "") {
	$curl = curl_init();
	$userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
	curl_setopt($curl, CURLOPT_URL, $url);
	//The URL to fetch. This can also be set when initializing a session with curl_init().
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 50);
	//The number of seconds to wait while trying to connect.
	if ($post != "") {
		curl_setopt($curl, CURLOPT_POST, 50);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	}
	curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
	//The contents of the "User-Agent: " header to be used in a HTTP request.
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	//To follow any "Location: " header that the server sends as part of the HTTP header.
	curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
	//To automatically set the Referer: field in requests where it follows a Location: redirect.
	curl_setopt($curl, CURLOPT_TIMEOUT, 100000);
	//The maximum number of seconds to allow cURL functions to execute.
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	//To stop cURL from verifying the peer's certificate.
	$contents = curl_exec($curl);
	curl_close($curl);
	return $contents;
}


//google response with contact. We set a session and redirect back
if (isset($_GET['code'])) {
	$auth_code = $_GET["code"];
	$_SESSION['google_code'] = $auth_code;
}


/*
    Check if we have session with our token code and retrieve all contacts, by sending an authorized GET request to the following URL : https://www.google.com/m8/feeds/contacts/default/full
    Upon success, the server responds with a HTTP 200 OK status code and the requested contacts feed. For more informations about parameters check Google API contacts documentation
*/
if(isset($_SESSION['google_code'])) {
	$auth_code = $_SESSION['google_code'];
	$max_results = 2000;
    $fields=array(
        'code'=>  urlencode($auth_code),
        'client_id'=>  urlencode($google_client_id),
        'client_secret'=>  urlencode($google_client_secret),
        'redirect_uri'=>  urlencode($google_redirect_uri),
        'grant_type'=>  urlencode('authorization_code')
    );
    $post = '';
    foreach($fields as $key=>$value)
    {
        $post .= $key.'='.$value.'&';
    }	
    $post = rtrim($post,'&');
	
	
    $result = curl('https://accounts.google.com/o/oauth2/token',$post);
    $response =  json_decode($result);
    @$accesstoken = $response->access_token;
    $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&alt=json&v=3.0&oauth_token='.$accesstoken;
    $xmlresponse =  curl($url);
    $contacts = json_decode($xmlresponse,true);

    /*echo '<pre>';
    print_r($contacts);
	*/
	//deg ($contacts['feed']['entry']);
	
	foreach ($contacts['feed']['id'] as $key => $user) {
		

	}



	$email_Id=$user;
	$return = array();

	if (!empty($contacts['feed']['entry'])) {
		foreach($contacts['feed']['entry'] as $contact) {
			
			
			//var_dump($contact);
			/*echo '<pre>';
			print_r($contact);*/


			//$contactidlink = explode('/',$contact['id']['$t']);
			//$contactId = end($contactidlink);
			
			//retrieve user photo
			if (isset($contact['link'][0]['href'])) {
				
				$url =   $contact['link'][0]['href'];
				
				$url = $url . '&access_token=' . urlencode($accesstoken);
				
				$curl = curl_init($url);

		        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($curl, CURLOPT_TIMEOUT, 150000);
				curl_setopt($curl, CURLOPT_VERBOSE, true);
		
		        $image = curl_exec($curl);
		        curl_close($curl);
				
				
				//echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" />';
				
				    
			}
			
			//retrieve Name + email and store into array
			$return[] = array (
					'contact_sync_from'=>$email_Id,
					'name'=> @$contact['title']['$t'],
					'note'=> @$contact['content']['$t'],
					'email' => @$contact['gd$email'][0]['address'],
					'phoneNumber'=>@$contact['gd$phoneNumber'][0]['$t'],
					'work_phoneNumber'=>@$contact['gd$phoneNumber'][1]['$t'],
					'birthdate'=>@$contact['gContact$birthday']['when'],
					'file_as'=>@$contact['gContact$fileAs']['$t'],
					'image' => @$image,
					'organizationName'=>@$contact['gd$organization'][0]['gd$orgName']['$t'],
					'organizationTitle'=>@$contact['gd$organization'][0]['gd$orgTitle']['$t'],
					'category'=>@$contact['category'][0]['term'],
					'address'=>@$contact['gd$structuredPostalAddress'][0]['gd$formattedAddress'][$t],
				'street'=>@$contact['gd$structuredPostalAddress'][0]['gd$street'][$t],
				'neighborhood'=>@$contact['gd$structuredPostalAddress'][0]['gd$neighborhood'][$t],
				'city'=>@$contact['gd$structuredPostalAddress'][0]['gd$city'][$t],
					'website'=>@$contact['gContact$website'][0]['href']

			);


		}				
	}
	
	$google_contacts = $return;
						
	unset($_SESSION['google_code']);
	



	//Now that we have the google contacts stored in an array, display all in a table
	if(!empty($google_contacts)) {
		/*echo '<div class="container">';
		echo "<strong>Here is your contact list. Good luck</strong><br><br>";
		echo '<table class="table table-striped">';*/
		





		foreach ($google_contacts as $contact) {

			/*var_dump($contact);*/
//			$this->db->insert('gmail_contact',$contact);
			$owner_contact_email=$this->session->userdata('email');
			$contact_sync_from=$contact['contact_sync_from'];
			$nm=$contact['name'];
			$exits_email=$contact['email'];
			$phone=$contact['phoneNumber'];
			$work_phone=$contact['work_phoneNumber'];
			$note=$contact['note'];
			$image=base64_encode($contact['image']);
			$o_Name=$contact['organizationName'];
			$o_Title=$contact['organizationTitle'];
			$cat=$contact['category'];
			$file_as=$contact['file_as'];
			$b_date=$contact['birthdate'];
			$website=$contact['website'];
			$address=$contact['address'];
			$note=$contact['note'];

			$inss=mysqli_query($con,"SELECT * FROM gmail_contact WHERE contact_owner_name='".$owner_contact_email."' AND  contact_email='".$exits_email."' AND contact_sync_from='".$contact_sync_from."'");
			$num=mysqli_num_rows($inss);

			if($num==1){


				$uppContact=mysqli_query($con,"UPDATE gmail_contact SET 
					contact_owner_name='".$owner_contact_email."',
					'contact_sync_from'='".$contact_sync_from."',
					name='".$nm."', 
					contact_email='".$exits_email."',
					phoneNumber='".$phone."',
					work_phoneNumber='".$work_phone."',
					image='".$image."',
					organizationName='".$o_Name."',
					organizationTitle='".$o_Title."',
					category='".$cat."',
					file_as='".$file_as."',
					birthdate='".$b_date."',
					website='".$website."',
					address='".$address."',
					note='".$note."'

					WHERE contact_email='".$exits_email."'
					");	
				if($inss>0){
					header('Location:'.base_url().'ContactList');
				}else{
					header('Location:'.base_url().'Dashboard');
				}

			}else{
			/*$nm=$contact['name'];
			$eml=$contact['email'];*/
			$inss=mysqli_query($con,"INSERT INTO gmail_contact (contact_owner_name,contact_sync_from,name, contact_email, phoneNumber,work_phoneNumber,image,organizationName,organizationTitle,category,file_as,birthdate,website,address,note) VALUES ('".$owner_contact_email."','".$contact_sync_from."','".$nm."','".$exits_email."','".$phone."','".$work_phone."','".$image."','".$o_Name."','".$o_Title."','".$cat."','".$file_as."','".$b_date."','".$website."','".$address."','".$note."')");
			if($inss>0){
					header('Location:'.base_url().'ContactList');
				}else{
					header('Location:'.base_url().'Dashboard');
				}
			}

			
			/*echo '<tr>';
			echo '<td>'.$contact['name'].'</td>';
			echo '<td>'.$contact['email'].'</td>';
			echo '<td>Mobile :'.$contact['phoneNumber'].'</td>';
			echo '<td>NOte :'.$contact['note'].'</td>';
			echo '<td>organization :'.$contact['organization'].'</td>';
			echo '<td>organizationName :'.$contact['organizationName'].'</td>';
			echo '<td>category :'.$contact['category'].'</td>';
			echo '<td>address :'.$contact['address'].'</td>';
			echo '<td>street :'.$contact['street'].'</td>';
			echo '<td>website :'.$contact['website'].'</td>';*/
			
			/*if(!empty($contact['image']) and $contact['image']!='Photo not found') :
			?>
				<td><img src="data:image/jpeg;base64,<?php echo base64_encode( $contact['image'] ); ?>" /></td>
			<?php
			else:
				echo '<td></td>';
			endif;*/
			
		    /*echo '</tr>';*/
		}
		/*echo '</table>';
		echo '</div>';*/
	}
						
}
					
?>

 <div class="container">
	<div class="row">
		<div class="import-contact-area">
		<div class="col s12 m12">
			<h6>To Import Your Contact, hit on the <b>Import Contact </b> Button.</h6>
			<div class="row"><a class="btn btn-flat btn-import-contact" href="<?php echo $googleImportUrl; ?>" role="button">Import google contacts</a></div>
		</div>
		</div>
	</div>
</div>

<!-- Google CDN's jQuery -->
<!-- <img src="https://mail.google.com/mail/u/0/?logout&hl=en" />
<a href="https://mail.google.com/mail/u/0/?logout&hl=en">Logout</a> -->
</div>
</div>