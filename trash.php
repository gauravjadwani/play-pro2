<form action="">
<button onclick="submit()" name="bt">run</button>
</form>
   

<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "www.google.com"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,FALSE); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);      

?>