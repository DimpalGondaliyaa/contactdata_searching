 $(function(){
    document.getElementById("file").onchange = function () {
    document.getElementById("uploadFile").value = this.files[0].name;
      };

  })