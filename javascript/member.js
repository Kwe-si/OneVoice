// const submitforms=document.querySelectorAll('.form-submit');
const formdata = new FormData();
const popup = document.querySelector('.popup');
const popupForm = document.querySelector("#popup-form");

const onEdit = (e) => {
    const submitform = e.target;
    console.log(submitform);
    e.preventDefault();
    popup.classList.add('popup-show');
    const memID = submitform.ID.value;
    console.log(memID);
    formdata.append('ID',memID);
    fetch('mem_select.php', {
        method:'POST',
        body: formdata,
    }).then(resp => {
        return resp.json();
    }).then(json => {
        updateForm(json[0]);
    });
}


const closePopup = (e) => {
    e.preventDefault();
    popup.classList.remove("popup-show");
    popupForm.reset();
}

const updateForm = (formData) => {
    console.log(formData);
    popupForm.fname.value = formData["fname"];
    popupForm.Mname.value = formData["middlename"];
    popupForm.lname.value = formData["lname"];
    if(formData["gender"] === "Male") {
        popupForm.gender[0].checked = true;    
    } else {
        popupForm.gender[1].checked = true; 
    }
    popupForm.DOB.value = formData["DOB"];
    popupForm.parnum.value = formData["contact"];
    popupForm.nationality.value = formData["nationality"];
    popupForm.address.value = formData["residential_address"];
    popupForm.department.value = formData["deptName"];
    popupForm.project.value = formData["projectName"] ?? "";
    popupForm.projectro.value = formData["projectrole"];
    popupForm.event.value = formData["eventName"];
    popupForm.eventro.value = formData["eventrole"];
    popupForm.memID.value = formData["memID"];
    popupForm.eventID.value = formData["eventID"];
    popupForm.deptNum.value = formData["deptNum"];
    popupForm.personID.value = formData["PersonID"];
    popupForm.devID.value = formData["devID"];
}