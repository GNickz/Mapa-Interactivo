
//Funcion para validar los formularios para la creacion de nuevos usuario o nuevos roles

function controlTag(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla==8) return true;
    else if (tecla==0||tecla==9)return true;
    patron =/[0-9\s]/;
    n= String.fromCharCode(tecla);
    return patron.test(n);
}

function testText(txtString)
{
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
    if(stringText.test(txtString))
    {
        return true;
    }else
    {
        return false;
    }
}

function testalphanumeric(inputtxt)
{
 var letterNumber = new RegExp(/^[0-9a-zA-Z]+$/);
    if(inputtxt.value.test(letterNumber)) 
    {
        return true;
    }else
    { 
        return false; 
    }
}

/*function testlengthRange(inputint, minlength, maxlength)
{  	
   var userNumber  
   if(userNumber.length >= 0 && userInput.length <= 10)
      {  	
        return true;  	
      }
   else
      {  	 		
        return false;  	
      }  
}
*/

function testEntero(intCant)
{
    var intCantidad = new RegExp(/^([0-9])*$/);
    if(intCantidad.test(intCant))
    {
        return true;
    }else
    {
        return false;
    }
}

function fntEmailValidate(email)
{
    var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(stringEmail.test(email) == false)
    {
        return false;
    }else
    {
        return true;
    }
}

function fntValidText()
{
    let valiText = document.querySelectorAll(".validText");
    valiText.forEach(function(validText)
    {
        validText.addEventListener('keyup', function()
        {
            let inputValue = this.value;
            if(!testText(inputValue))
            {
                this.classList.add('is-invalid');
            }else
            {
                this.classList.remove('is-invalid');
            }
        });
    });
}

function fntValidNumberText()
{
    let valiNumberText = document.querySelectorAll(".validNumberText");
    valiNumberText.forEach(function(validNumberText)
    {
        validNumberText.addEventListener('keyup', function()
        {
            let inputValue = this.value;
            if(!testalphanumeric(inputValue))
            {
                this.classList.add('id-invalid');
            }else
            {
                this.classList.remove('is-valid');
            }
        })
    })
}

function fntValidNumber()
{
    let validNumber = document.querySelectorAll(".validNumber");
    validNumber.forEach(function(validNumber)
    {
        validNumber.addEventListener('keyup', function()
        {
            let inputValue = this.value;
            if(!testEntero(inputValue))
            {
                this.classList.add('is-invalid');
            }else
            {
                this.classList.remove('is-invalid');
            }
        });
    });
}

/*function fntlengthRangeValidate()
{
    let validRange = document.querySelectorAll(".validRange");
    validRange.forEach(function(validRange)
    {
        validRange.addEventListener('keyup', function()
        {
            let inputValue = this.value;
            if(!testlengthRange(inputValue))
            {
                this.classList.add('is-invalid');
            }else
            {
                this.classList.remove('is-invalid')
            }
        });
    });
   
}*/


function fntValidEmail()
{
    let validEmail = document.querySelectorAll(".validEmail");
    validEmail.forEach(function(validEmail)
    {
        validEmail.addEventListener('keyup', function()
        {
            let inputValue = this.value;
            if(!fntEmailValidate(inputValue))
            {
                this.classList.add('is-invalid');
            }else
            {
                this.classList.remove('is-invalid');
            }
        });

    });
}


window.addEventListener('load', function()
{
    fntValidText();
    fntValidNumber();
    //fntlengthRangeValidate();
    fntValidEmail();
}, false);