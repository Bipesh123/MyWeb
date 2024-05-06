
  function myFunction(){
    // alert("DONE");
  var x=document.getElementById("brands").value;
  // alert(x);
  if(x=="2"){
    document.getElementById("brand_ref").innerHTML="<select name='brand[]' id='brands' class='form-control' required><option value='2'>Apple</option></select>";
  document.getElementById("refresh").innerHTML = "  <select name='os' class='form-control' required> <option value='2'>IOS</option></select> ";
  return false;
}
else{
  document.getElementById("brand_ref").innerHTML= '<select name="brand[]" id="brands" class="form-control" required=""  multiple><option value="">Select</option><option value="1">Samsung</option><option value="3">Xiaomi</option> <option value="4">Huawei</><option value="5">Oppo</option><option value="6">Colors</option><option value="7">Nokia</option><option value="8">Micromax</option><option value="10">Gionee</option><option value="11">Sony</option<option value="12">Vivo</option><option value="13">Asus</option><option value="14">HTC</option><option value="15">Lenevo</option></select>';
  document.getElementById("refresh").innerHTML =' <select name="os" class="form-control" required=""><option value="">Select</option><option value="1">Andriod</option><option value="3">Windows</option></select>';
  return false;

}
}


$(document).ready(function(){
 function checkWidth() {
        var windowSize = $(window).width();

        if (windowSize >= 768) {
            $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 320) {
            $(".shopping_header").addClass('fixed');
                       
  
        } else {
            $(".shopping_header").removeClass("fixed");
                        
 
        }
    });
        } else{
   $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 6000) {
            $(".shopping_header").addClass('fixed');
      
  
        } else {
            $(".shopping_header").removeClass("fixed");
                         
 
        }
    });
   } 
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth)
        

        

});

  function myFunction(){
    // alert("DONE");
  var x=document.getElementById("brands").value;
  // alert(x);
  if(x=="2"){
    document.getElementById("brand_ref").innerHTML="<select name='brand[]' id='brands' class='form-control' required><option value='2'>Apple</option></select>";
  document.getElementById("refresh").innerHTML = "  <select name='os' class='form-control' required> <option value='2'>IOS</option></select> ";
  return false;
}
else{
  document.getElementById("brand_ref").innerHTML= '<select name="brand[]" id="brands" class="form-control" required=""  multiple><option value="">Select</option><option value="1">Samsung</option><option value="3">Xiaomi</option> <option value="4">Huawei</><option value="5">Oppo</option><option value="6">Colors</option><option value="7">Nokia</option><option value="8">Micromax</option><option value="10">Gionee</option><option value="11">Sony</option<option value="12">Vivo</option><option value="13">Asus</option><option value="14">HTC</option><option value="15">Lenevo</option></select>';
  document.getElementById("refresh").innerHTML =' <select name="os" class="form-control" required=""><option value="">Select</option><option value="1">Andriod</option><option value="3">Windows</option></select>';
  return false;

}
}

$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});


$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});



  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
        

var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

 $('.inputMax').on('change' , function() {
  var max =parseFloat($('.inputMax').val());
  var min =parseFloat($('.inputMin').val());
  if (min>= max){
    $('.inputMin').val(max-2000);
  }
 });