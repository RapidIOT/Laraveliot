<h1> Hello {{$shareWith->firstname}},</h1>

<p>{{$sharedBy->firstname}}, has shared his device access with you.</p>

<p>Please check <a href="http://www.rapidiot.xyz/devices">your account</a> to access the device.</p>

<h4>your Login Details:</h4>
<p><strong>Username:</strong> {{$shareWith->email}}</p>
<p><strong>Password:</strong> {{$password}}</p>


<p>Please <a href="http://www.rapidiot.xyz/edit_profile">Update your profile</a> after login. </p>


<p>Thank you.</p>