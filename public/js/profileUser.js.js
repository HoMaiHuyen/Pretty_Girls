function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
 


// đẩy ảnh lên cloudinary 
let file = null;
var loadFile = function (event) {

  for (let i = 0; i <= event.target.files.length - 1; i++) {
         
    const fsize = event.target.files.item(i).size;
    const filee = Math.round((fsize / 1024));
    // The size of the file.
    if (filee > 4096) {
        alert("File too Big, please select a file less than 4mb");
    } else {
      var output = document.getElementById('output');
      file = event;
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
      }
    }
  }
};

async function uploadImg() {
  const cloud_name = "duas1juqs";
  const upload_preset = "pnvimage";

  let url = '';

  const formData = new FormData();
  formData.append("file", file.target.files[0]);
  formData.append("upload_preset", upload_preset);
  const options = {
    method: "POST",
    body: formData,
  };

if (file) {
    await fetch(
      `https://api.cloudinary.com/v1_1/${cloud_name}/image/upload`,
      options
    )
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        url = data.secure_url
      })
      .catch((err) => console.log(err));
    // return url
    console.log(url);
  }

  return;

}