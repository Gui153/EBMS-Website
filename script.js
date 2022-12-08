

function reset(){
  var check = document.getElementById("Fname");
  check.value="";
  check= document.getElementById("Lname");
  check.value="";
  check = document.getElementById("pwd");
  check.value="";
  check= document.getElementById("LID");
  check.value="";
  check= document.getElementById("PN");
  check.value="";
  check= document.getElementById("isEmail");
  check.checked = false;
  check = document.getElementById("test");
  test.innerHTML = "";
  }
  //------------------------------------------------------------------------------------------------
  function CCO(){
    //Client id check
    prob='Client ID#\n';
    check = document.getElementById("CID");
    if(check.value.length == 0){
      prob += "No input on ID\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }
    prob='Service ID#\n';
    check = document.getElementById("SNum");
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    return true;
  }
  //------------------------------------------------------------------------------------------------
  function PCO(){
   
    check = document.getElementById("CFname");
    //first name check
    test = true;
    prob = "Name:\n";
    if(check.value.length == 0){
      prob +="No input on first name.";
      alert(prob);
      check.focus();
      return false; 
    }
    if(check.value.match("[0-9]")){
      prob +=("A name does not contain numbers.");  
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob +=("A name starts with a capital letter, followed by lower case letters.");
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    //last name check
    check = document.getElementById("CLname");
    prob = "Last Name:\n";
    if(check.value.length == 0){
      window.alert("Last Name:\nNo input on last name");
      check.focus();
      return false;
    }
    if(check.value.match("[0-9]")){
      prob += ("A last name does not contain numbers");   
      check.focus();
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob += ("A last name starts with a capital letter, followed by lower case letters");
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }
    //Client id check
    prob='Client ID#\n';
    check = document.getElementById("CID");
    if(check.value.length == 0){
      prob += "No input on ID\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }
    prob='Service ID#\n';
    check = document.getElementById("SNum");
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    prob='Products:\n';
    check = document.getElementById("CID");
    test = true;
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }

    return true;
  }
  //------------------------------------------------------------------------------------------------
  function UCO(){
    prob='Client ID#\n';
    check = document.getElementById("CID");
    test = true;
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    prob='Service ID#\n';
    check = document.getElementById("SNum");
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    prob='Products:\n';
    check = document.getElementById("CID");
    test = true;
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    return true;
  }
  //------------------------------------------------------------------------------------------------
  function CCA(){
    prob='Client ID#\n';
    check = document.getElementById("CID");
    test = true;
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    prob='Service ID#\n';
    check = document.getElementById("SNum");
    if(check.value.length == 0){
      prob += "No input\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    return true;
  }
  //------------------------------------------------------------------------------------------------
  function CNCA(){
    
    check = document.getElementById("CFname");
    //first name check
    test = true;
    prob = "Name:\n";
    if(check.value.length == 0){
      prob +="No input on first name.";
      alert(prob);
      check.focus();
      return false; 
    }
    if(check.value.match("[0-9]")){
      prob +=("A name does not contain numbers.");  
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob +=("A name starts with a capital letter, followed by lower case letters.");
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    //last name check
    check = document.getElementById("CLname");
    prob = "Last Name:\n";
    if(check.value.length == 0){
      window.alert("Last Name:\nNo input on last name");
      check.focus();
      return false;
    }
    if(check.value.match("[0-9]")){
      prob += ("A last name does not contain numbers");   
      check.focus();
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob += ("A last name starts with a capital letter, followed by lower case letters");
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }
    //id check
    prob='ID#\n';
    check = document.getElementById("CID");
    if(check.value.length == 0){
      prob += "No input on ID\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    return true;
  }
  
  
  //-----------------------------------------------------------------------
  function BCA(){
    check = document.getElementById("CFname");
    //first name check
    test = true;
    prob = "Name:\n";
    if(check.value.length == 0){
      prob +="No input on first name.";
      alert(prob);
      check.focus();
      return false; 
    }
    if(check.value.match("[0-9]")){
      prob +=("A name does not contain numbers.");  
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob +=("A name starts with a capital letter, followed by lower case letters.");
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    //last name check
    check = document.getElementById("CLname");
    prob = "Last Name:\n";
    if(check.value.length == 0){
      window.alert("Last Name:\nNo input on last name");
      check.focus();
      return false;
    }
    if(check.value.match("[0-9]")){
      prob += ("A last name does not contain numbers");   
      check.focus();
      test = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob += ("A last name starts with a capital letter, followed by lower case letters");
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }

    prob='ID#\n';
    check = document.getElementById("CID");
    if(check.value.length == 0){
      prob += "No input on ID\n";
      check.focus();
      alert(prob);
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      test = false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      test = false;
    }
    if (check.value.length > 6 ){
      prob +="ID must contain 6 numbers or less, your has " + check.value.length;
      check.focus();
      test = false;
    }
    if(test == false){
      alert(prob);
      check.focus();
      return false
    }



    prob = "Address:\n";
    check = document.getElementById("address");
    if(check.value.length == 0){
      prob+=("No input.");
      alert(prob);
      check.focus();
      return false
    }

    prob = "Service:\n";
    check = document.getElementById("service");
    if(check.value.length == 0){
      prob+=("No input.");
      alert(prob);
      check.focus();
      return false
    }

    prob = "Date:\n";
    check = document.getElementById("Date");
    if(!check.value.match("^[\\d]{4}([-][\\d]{2}){2}$")){
      prob+=("No input or incorrect syntax\n");
      alert(prob);
      check.focus();
      return false
    }

    return true;
  }
 //-----------------------------------------------------------------------
  function sub(){
    var res = true;
    var prob = "";
    var check = document.getElementById("Fname");
    //name check
    prob = "Name:\n";
    if(check.value.length == 0){
      window.alert("Name:\nNo input on first name.");
      check.focus();
      return false; 
    }
    if(check.value.match("[0-9]")){
      prob+=("A name does not contain numbers.\n");  
      check.focus();
      res= false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob+="A name starts with a capital letter, followed by lower case letters.\n";
      check.focus();
      res= false;
    }
    if(res == false){
      alert(prob);
      return false;
    }
    alert(prob);
    //last name check
    prob = "Last Name:\n"
    check = document.getElementById("Lname");
    if(check.value.length == 0){
      window.alert("Last Name:\n No input on last name");
      check.focus();
      return false;
    }
    if(check.value.match("[0-9]")){
      prob+=("A last name does not contain numbers\n");   
      check.focus();
      res = false;
    }
    if (!check.value.match("^[A-Z][A-za-z]+")){
      prob+= ("A last name starts with a capital letter, followed by lower case letters\n");
      check.focus();
      res=  false;
    }
    if(res == false){
      alert(prob);
      return false;
    }
      //phone check
      prob = "Phone Number\n";
      check = document.getElementById("PN");
      if(check.value.length == 0){
        window.alert("Phone#:\nNo input on phone number");
        check.focus();
        return false;
      }
      if(check.value.length < 12 || check.value.length > 12 ){
        prob +="The phone number must have 10 numbers\n";
        check.focus();
        res = false;
      }
      prob = "Phone#:\n";
      if(check.value.match("[A-Za-z]")){
        prob +="The phone number must have numbers only\n";
        check.focus();
        res = false;
      }
      if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
        prob +="A phone number does not contain special characters except for \"-\"\n";
        check.focus();
        res = false;
      }
      if (!check.value.match("\\d{3}[- ]\\d{3}[- ]\\d{4}")){
        prob += "It must include - or space between the numbers\n";
        check.focus();
        res = false;
      }
      if(res == false){
        alert(prob);
        return false;
      }

    
    //id check
    prob='ID#\n';
    
    check = document.getElementById("LID");
    if(check.value.length == 0){
      window.alert(prob + "No input on ID");
      check.focus();
      return false;
    }
    if(check.value.match("[A-Za-z]")){
      prob += "No letters allowed\n";
      check.focus();
      res= false;
    }
    if(check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
      prob += "No special characters allowed\n";
      check.focus();
      res= false;
    }
    if (!check.value.match("\\d{6}") || check.value.length > 6){
      prob +="ID must contain 6 numbers, your has " + check.value.length;
      check.focus();
      res = false;
    }
    if(res == false){
      alert(prob);
      return false;
    }

    //pass check
    prob='Password:';
    check = document.getElementById("pwd");
    if(check.value.length == 0){
      window.alert(prob + "\nNo input on password");
      check.focus();
      return false;
    }
    if(!check.value.match("(?=.*[A-Z])(?=.*[0-9])(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])[A-Za-z0-9\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/]{1,12}")){
      if(!check.value.match("(?=.*[A-Z])")){
        prob+="\nThe password must contain a uppercase letter.";
      }
      if(!check.value.match("(?=.*[0-9])")){
        prob+="\nThe password must contain a number.";
      }
      if(!check.value.match("(?=.*[\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\]\\}\\[\\{\"\'\\:\\;\\?\\/\\>\\.\\<\\,\\/])")){
        prob+="\nThe password must contain a special character."; 
      }
      if(check.value.length>12 || check.value.length == 0){
        prob+="\nThe password max size is 12."; 
      }
      window.alert(prob);
      check.focus();
      return false;
    }
    else if(check.value.length> 12){
      alert(prob+"\nThe password max size is 12.");
      check.focus();
      return false;
    }
    

    check = document.getElementById("isEmail").checked;
    //check email
    if(check){
      prob = "";
      check = document.getElementById("email");
      if(check.value.length == 0){
        window.alert("No input on email");
        check.focus();
        return false;
      }
  
      if(!check.value.match("[\@][a-z]{2,4}[.]")){
        if(!check.value.match("[\@]")){
          prob += "Must include one @\n";
        }
        if(!check.value.match("[\@][a-z]{2,4}")){
          if(!check.value.match("[a-z]{2,4}[.]")){
            prob += "Must include a domain of 2 to 4 letters followed by a '.' after the domain\n";
          }
        }
        else
          prob += "Must include a domain of 2 to 4 letters\n";
        if(!check.value.match("[.]")){
          prob += "Must include a '.' after the domain\n";
        }
        alert("" + prob);
        check.focus();
        return false;
      }
    }
    return true;
  }
  
  
  
  
  function putEmail(isEmail){
    var test = document.getElementById("test");
    if(isEmail.checked){
      test.innerHTML += 'Email:<input type="text" name = "email" id = "email" placeholder="example@LLAL.com"><br>';
    }
    else{
      test.innerHTML = "";
    }
    
  }

  function changeHead(bt,val) {
    bt.bgColor = "green";
    if(val == 1){
      bt.value = 0;
      bt.bgColor = "background-color: black";
    }
  }

  function changeColor(bt,val) {
    bt.tyle.cssText  = "green";
    if(val == 1){
      bt.value = 0;
      bt.style.cssText = "background-color: black";
    }
  }
