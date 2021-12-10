// validation for first name
const fname = document.getElementById('fname');
const erroMsg = document.getElementById('error');
const validateFname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(fname.value);
    if(!fname.value){
        erroMsg.style.color="red";
        erroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        erroMsg.style.color="";
        erroMsg.innerText = "";
    }
}

//validation for middle name
const Mname = document.getElementById('Mname');
const MerroMsg = document.getElementById('Merror');
const validateMname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(Mname.value);
    if(!Mname.value){
        MerroMsg.style.color="red";
        MerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        MerroMsg.style.color="";
        MerroMsg.innerText = "";
    }
}

//validation for last name
const lname = document.getElementById('lname');
const lerroMsg = document.getElementById('lerror');
const validateLname = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(lname.value);
    if(!lname.value){
        lerroMsg.style.color="red";
        lerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        lerroMsg.style.color="";
        lerroMsg.innerText = "";
    }
}

//validation for Date of Birth
const Dob = document.getElementById('DOB');
const derroMsg = document.getElementById('derror');
const validateDate = (e) =>{
    if(!Dob.value){
        derroMsg.style.color="red";
        derroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    } 
    else{
        derroMsg.style.color="";
        derroMsg.innerText = "";
    }
}

//validation for nationality
const nationality = document.getElementById('nationality');
const nerroMsg = document.getElementById('nerror');
const validateN = (e) =>{
    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;
    const testNameReg = fullnamereg.test(nationality.value);
    if(!nationality.value){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        nerroMsg.style.color="";
        nerroMsg.innerText = "";
    }
}

//validation for contact
const parnum = document.getElementById('parnum');
const pnumerroMsg = document.getElementById('pnumerror');
const validatePNUM = (e) =>{
    const parnumreg = /^[0-9]*$/;
    const testNameReg = parnumreg.test(parnum.value);
    if(!parnum.value){
        pnumerroMsg.style.color="red";
        pnumerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
       pnumerroMsg.style.color="red";
        pnumerroMsg.innerText = "Wrong input, enter a number";
        e.preventDefault();
    }
    else{
        pnumerroMsg.style.color="";
        pnumerroMsg.innerText = "";
    }
}

//validation for address
const address = document.getElementById('address');
const aerroMsg = document.getElementById('aerror');
const validateA = (e) =>{
    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;
    const testNameReg = fullnamereg.test(address.value);
    if(!address.value){
        aerroMsg.style.color="red";
        aerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else{
        aerroMsg.style.color="";
        aerroMsg.innerText = "";
    }
}








