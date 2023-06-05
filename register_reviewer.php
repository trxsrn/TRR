<?php 

session_start();
    
include 'navbar.php' ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIGN UP</title>
	<link rel="stylesheet" href="css/register_reviewer.css">
</head>
<body>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<div class="wrapper">
	<h2> SIGN UP AS REVIEWER</h2>
	<div class="header1">
		<ul class="progress-bar">
			<li class="active form_1_progessbar">
				<div>
					<p>1</p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p>2</p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p>3</p>
				</div>
			</li>
			<li class="form_4_progessbar">
				<div>
					<p>4</p>
				</div>
			</li>
		</ul>
	</div>
	<div class="form_wrap">
	<form action="register_submit.php" method="post" id="form_register" enctype="multipart/form-data" >
		<div class="form_1 data_info" id="page_one">
				<div class="form_container">
					<div class="fullname">
						<div class="input_wrap">
							<label for="lastname">Last Name:</label>
							<input type="text" name="lastname" class="input" id="lastname" placeholder="Dela Cruz" required>
						</div>
						<div class="input_wrap">
							<label for="given_name">Given Name:</label>
							<input type="text" name="givenname" class="input" id="givenname" placeholder="Juan" required>
						</div>
						<div class="input_wrap">
							<label for="middle_initial">M.I.</label>
							<input type="text" name="middleinitial" class="input" id="middleinitial">
						</div>
						<div class="input_wrap">
							<label for="suffix">Suffix</label>
							<select class="input" name="suffix" id="suffix">
								<option value="">     </option>
								<option value="Jr"> Jr. </option>
								<option value="Sr"> Sr. </option>
								<option value="I"> I </option>
								<option value="II"> II </option>
								<option value="III"> III </option>
								<option value="IV"> IV </option>
							</select>
						</div>
					</div>
					<div class="contact">
						<div class="input_wrap">
							<label for="birthdate">Birth Date:</label>
							<input type="date" name="birthdate" class="input" id="birthdate" required>
						</div>
						<div class="input_wrap">
							<label for="number">Contact Number:</label>
							<input type="text" name="number" class="input" id="number" required>
						</div>
					</div>
					<div class="address-part1">
						<div class="input_wrap">
							<label for="unit">Unit/ Lot:</label>
							<input type="text" name="unit" class="input" id="unit">
						</div>
						<div class="input_wrap">
							<label for="street">Street:</label>
							<input type="text" name="street" class="input" id="street">
						</div>
						<div class="input_wrap">
							<label for="barangay">Barangay:</label>
							<input type="text" name="barangay" class="input" id="barangay">
						</div>
					</div>
					<div class="address-part2">
						<div class="input_wrap">
							<label for="city">City/ Municipality:</label>
							<input type="text" name="city" class="input" id="city">
						</div>
						<div class="input_wrap">
							<label for="province">Province:</label>
							<input type="text" name="province" class="input" id="province">
						</div>
						<div class="input_wrap">
							<label for="province">Country:</label>
							<select name="country" id="country"> 
								<option value="">Select a country</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antarctica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="British Virgin Islands">British Virgin Islands</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote d'Ivoire">Cote d'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curacao">Curaçao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guernsey">Guernsey</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Ivory Coast">Ivory Coast</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jersey">Jersey</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Kosovo">Kosovo</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macao">Macao</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia">Micronesia</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montenegro">Montenegro</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="North Korea">North Korea</option>
								<option value="North Macedonia">North Macedonia</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines" selected>Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of the Congo">Republic of the Congo</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Barthelemy">Saint Barthelemy</option>
								<option value="Saint Helena">Saint Helena</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Martin">Saint Martin</option>
								<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino" name="San Marino">San Marino</option>
								<option value="Sao Tome and Principe" name="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia" name="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal" name="Senegal">Senegal</option>
								<option value="Serbia" name="Serbia">Serbia</option>
								<option value="Seychelles" name="Seychelles">Seychelles</option>
								<option value="Sierra Leone" name="Sierra Leone">Sierra Leone</option>
								<option value="Singapore" name="Singapore">Singapore</option>
								<option value="Slovakia" name="Slovakia">Slovakia</option>
								<option value="Slovenia" name="Slovenia">Slovenia</option>
								<option value="Solomon Islands" name="Solomon Islands">Solomon Islands</option>
								<option value="Somalia" name="Somalia">Somalia</option>
								<option value="ZA" name="South Africa">South Africa</option>
								<option value="South Sudan" name="South Sudan">South Sudan</option>
								<option value="Spain" name="Spain">Spain</option>
								<option value="Sri Lanka" name="Sri Lanka">Sri Lanka</option>
								<option value="Sudan" name="Sudan">Sudan</option>
								<option value="Suriname" name="Suriname">Suriname</option>
								<option value="Sweden" name="Sweden">Sweden</option>
								<option value="Switzerland" name="Switzerland">Switzerland</option>
								<option value="Syria" name="Syria">Syria</option>
								<option value="Taiwan" name="Taiwan">Taiwan</option>
								<option value="Tajikistan" name="Tajikistan">Tajikistan</option>
								<option value="Tanzania" name="Tanzania">Tanzania</option>
								<option value="Thailand" name="Thailand">Thailand</option>
								<option value="Timor-Leste" name="Timor-Leste">Timor-Leste</option>
								<option value="Togo" name="Togo">Togo</option>
								<option value="Tonga" name="Tonga">Tonga</option>
								<option value="Trinidad and Tobago" name="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia" name="Tunisia">Tunisia</option>
								<option value="Turkey" name="Turkey">Turkey</option>
								<option value="Turkmenistan" name="Turkmenistan">Turkmenistan</option>
								<option value="Tuvalu" name="Tuvalu">Tuvalu</option>
								<option value="Uganda" name="Uganda">Uganda</option>
								<option value="Ukraine" name="Ukraine">Ukraine</option>
								<option value="United Arab Emirates" name="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom" name="United Kingdom">United Kingdom</option>
								<option value="United States of America" name="United States of America">United States of America</option>
								<option value="Uruguay" name="Uruguay">Uruguay</option>
								<option value="Uzbekistan" name="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu" name="Vanuatu">Vanuatu</option>
								<option value="Vatican City" name="Vatican City">Vatican City</option>
								<option value="Venezuela" name="Venezuela">Venezuela</option>
								<option value="Vietnam" name="Vietnam">Vietnam</option>
								<option value="Yemen" name="Yemen">Yemen</option>
								<option value="Zambia" name="Zambia">Zambia</option>
								<option value="Zimbabwe" name="Zimbabwe">Zimbabwe</option>
							</select>
						</div>
					</div>

				</div>
		</div>
		<div class="form_2 data_info" id="page_two" style="display: none;">
				<div class="form_container">
							<div class="discipline-list">
								<div class="input_wrap">
									<label for="discipline">Discipline: (Check all the disciplines that apply:)</label>
										<div class="discipline-listing">
										<input type="checkbox" class="checkbox" name="dscp[]" value="Digital & Transformative Education">Digital & Transformative Education  <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Culture, Arts, and Humanities">Culture, Arts, and Humanities <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Psychology & Social Sciences">Psychology & Social Sciences <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Business Innovation & Technopreneurship">Business Innovation & Technopreneurship <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Human Kinetics & Sports Science">Human Kinetics & Sports Science <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Engineering & Technology">Engineering & Technology <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Policy & International Studies">Policy & International Studies <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Urban Agriculture & Plant Biotechnology">Urban Agriculture & Plant Biotechnology <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Mushroom Biotechnology">Mushroom Biotechnology  <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Gender & Inclusive Education Studies">Gender & Inclusive Education Studies  <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Research to Extension ">Research to Extension <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Astronomy & Space Science Satellite Technology">Astronomy & Space Science Satellite Technology <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Environmental & Climate Change Studies">Environmental & Climate Change Studies <br>
										<input type="checkbox" class="checkbox" name="dscp[]" value="Data Science & Smart Analytics ">Data Science & Smart Analytics <br>
									</div>
								</div>
							</div>
							<div class="qualification-list">
								<div class="input_wrap">
									<label for="qualificiation">Qualification:</label>
									<select class="input" id="qualification" name="qualification">
										<option value="">-Select-</option>
										<option value="Bachelor Degree" name="bachelor">Bachelor Degree</option>
										<option value="Masters Degree" name="masters">Master's Degree</option>
										<option value="Doctorate Degree" name="doctorate">Doctorate Degree</option>
										<option value="Post-Doctorate" name="post_doctorate">Post-Doctorate Degree</option>
										<option value="Others" >Others</option>
									</select>
								</div>
								<div class="input_wrap">
									<label for="city">Specify:</label>
									<input type="text" name="specific_qualification" id="specific_qualification" placeholder="Indicate your highest degree and course" disabled>
								</div>
							</div>
							<div class="qualification-list">
								<div class="input_wrap">
									<label for="city">Designation:</label>
									<select class="input" id="designation" name="designation">
									<option value="" disabled selected hidden>Select Designation</option>
										<option value="National Scientist" name="assistant_professor">National Scientist</option>
										<option value="Academician" name="professor">Academician</option>
										<option value="Corresponding Member" name="hod">Corresponding Member</option>
										<option value="Career Scientist" name="principal">Career Scientist</option>
										<option value="Associate Scientist" name="associate_professor">Associate Scientist</option>
										<option value="Assistant Scientist" name="lecturer">Assistant Scientist</option>
										<option value="Science Research Analyst" name="technical_assistant">Science Research Analyst</option>
										<option value="Science Research Assistant" name="laboratory_technician">Science Research Assistant</option>
										<option value="Science Research Specialist" name="jr_scientist">Science Research Specialist </option>
										<option value="Senior Science Research Specialist" name="sr_scientist">Senior Science Research Specialist</option>
										<option value="Supervising Science Research Specialist" name="scientist">Supervising Science Research Specialist</option>
										<option value="Chief Science Research Specialist" name="director">Chief Science Research Specialist</option>
										<option value="University Research Associate" name="professional">University Research Associate</option>
										<option value="University Researcher" name="researcher">University Researcher</option>
										<option value="Researcher" name="dean">Researcher</option>
										<option value="Professor Emeritus" name="cto">Professor Emeritus</option>
										<option value="University Professor" name="senior_lecturer">University Professor</option>
										<option value="Full Professor" name="post_doctoral">Full Professor</option>
										<option value="Associate Professor" name="technical_researcher">Associate Professor</option>
										<option value="Assistant Professor" name="freelancer">Assistant Professor</option>
										<option value="Instructor" name="lecturer">Instructor</option>
										<option value="Secretary" name="technical_assistant">Secretary</option>
										<option value="Undersecretary" name="laboratory_technician">Undersecretary</option>
										<option value="Assistant Secretary" name="jr_scientist">Assistant Secretary</option>
										<option value="Director General" name="sr_scientist">Director General</option>
										<option value="Deputy Director General" name="scientist">Deputy Director General</option>
										<option value="Director" name="director">Director</option>
										<option value="Associate Director" name="professional">Associate Director</option>
										<option value="Assistant Director" name="researcher">Assistant Director</option>
										<option value="Division Chief" name="dean">Division Chief</option>
										<option value="Research Officer" name="cto">Research Officer</option>
										<option value="Program Officer" name="senior_lecturer">Program Officer</option>
										<option value="Project Officer" name="post_doctoral">Project Officer</option>
										<option value="Center Manager" name="technical_researcher">Center Manager</option>
										<option value="Program Leader" name="post_doctoral">Program Leader</option>
										<option value="Project Leader" name="technical_researcher">Project Leader</option>
										<option value="Freelancer" name="freelancer">Freelancer</option>
									</select>
								</div>
							</div>
							<div class="affiliation-list">
								<div class="input_wrap">
									<label for="city">Affiliation:</label>
									<select class="input" id="affiliation" name="affiliation">
										<option value="University" name="university">University</option>
										<option value="Organization" name="organization">Organization</option>
										<option value="None" name="none">None</option>
									</select>	
								</div>
								<div class="input_wrap">
									<label for="affiliation">Specify:</label>
									<input type="text" name="specific_affiliation" id="specific_affiliation" >
								</div>
							</div>
							<div class="input_wrap">
								<label for="cv">Curriculum Vitae</label>
								<input type="file" name="file_cv">
							</div>
							<div class="input_wrap">
								<label for="intent">Letter of Intent</label>
								<input type="file" name="file_intent">
							</div>
							
						
				</div>
		</div>
		<div class="form_3 data_info" id="page_three" style="display: none;">
				<div class="form_container">
					<div class="input_wrap">
						<label for="company">Email</label>
						<input type="email" name="email" class="input" id="eemail" required>
					</div>
					<div class="input_wrap">
						<label for="experience">Username</label>
						<input type="text" name="username" class="input" id="username" required>
					</div>
					<div class="input_wrap">
						<label for="password">Password</label>
						<input type="password" name="password" class="input" id="password" onkeyup="validatePassword()" required>
						<div id="passwordValidation"></div>
					</div>
					<div class="input_wrap">
						<label for="confirm_password">Confirm Password</label>
						<input type="password" name="confirm_password" class="input" id="confirm_password" onkeyup="validatePassword()" required>
					</div>

					<input type="checkbox"> I agree to the <a href="">terms and conditions</a>.
				</div>
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_1_btns">
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_2_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_next" onclick="storeValue()">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_3_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_done" id="submitBtn" onclick="displayValue()">SUBMIT</button>
		</div>
	</div>
</div>

<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<h2>REVIEWER APPLICATION FORM</h2>
		<br>
		<div class="personal_info">
			<label> Last Name: </label>
			<p id="last_name"></p>
			<label> Given Name: </label>
			<p id="given_name"></p>
			<label> Middle Initial: </label>
			<p id="middle_initial"></p>
			<label> Suffix: </label>
			<p id="suffixx"></p>
			<label> Birthdate: </label>
			<p id="bthday"></p>
			<label> Contact Number: </label>
			<p id="no"></p>
			<label> Address: </label>
			<p id="address"></p>
			<label> Discipline: </label>
			<p id="disciplines"></p>
			<label> Qualification: </label>
			<p id="quali"></p>
			<label> Designation: </label>
			<p id="designa"></p>
			<label> Affiliation: </label>
			<p id="afflia"></p>
			<label> Curriculum Vitae: </label>
			<p id="cv"></p>
			<label> Letter of Intent: </label>
			<p id="in"></p>
			<label> Email: </label>
			<p id="email"></p>
			<label> Username: </label>
			<p id="uname"></p>
		</div>
		<center>
			<input type="submit" class="submit" value="SUBMIT" name="submit_reviewer">
		</center>
	</div>
</div>
</form>
<script src="js/script.js"></script>
<script src="js/password_validation.js"></script>
<script src="js/select.js"></script>
<script src="js/displayValue.js"></script>
</body>
</html>

