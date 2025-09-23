
// Calculo Nº DNI Formulario
function CalculoLetraDNI()
{
    var dni = document.getElementById("DNInums").value;
    var noEsUnNumero = isNaN(dni);
    var letraDNI = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var EM = document.getElementById("EM");
    var CM = document.getElementById("CM");

    // Error DNI == 0
    if (dni == "")
    {
        EM.style.visibility = "visible";
        CM.style.visibility = "hidden";

        DNInums.style.backgroundColor= "#F9B5AC";
        Resultado.style.backgroundColor= "#F9B5AC";
        document.getElementById("Resultado").value = "ERROR!";

        noEsUnNumero = true;
    }
    // Si el DNI != 0
    if(dni != null)
    {
        // Error ==> input no es un Nº
        if(noEsUnNumero == true)
        {
            EM.style.visibility = "visible";
            CM.style.visibility = "hidden";
            alert("Error, please enter a valid number");

            DNInums.style.backgroundColor= "#F9B5AC";
            Resultado.style.backgroundColor= "#F9B5AC";
            document.getElementById("Resultado").value = "ERROR!";

            noEsUnNumero = true;
        }
        // Si el input es un Nº...
        if(noEsUnNumero == false)
        {        
            Resultado.style.backgroundColor= "white";
            var distintoDCero = esInt(dni);

            // El input NO se sale de los límites && NO es decimal...
            if(dni >= 0 && dni <= 99999999 && distintoDCero == true)
            {
                EM.style.visibility = "hidden";
                CM.style.visibility = "visible";

                DNInums.style.backgroundColor= "#3BC14A";
                resultado = letraDNI[dni % 23];
                document.getElementById("Resultado").value = resultado;

                noEsUnNumero = true;
            }

            // Error ==> Input negativo || Nº Superior al permitido x los límites(Supuesto caso imposible pero lo registro igual)
            else
            {
                EM.style.visibility = "visible";
                CM.style.visibility = "hidden";
                alert("Error, please enter a valid number");

                DNInums.style.backgroundColor= "#F9B5AC";
                Resultado.style.backgroundColor= "#F9B5AC";
                document.getElementById("Resultado").value = "ERROR!";
                document.getElementById("DNInums").innerHTML = "Please enter a valid number";
                noEsUnNumero = true;
            }
        }
    }
}

// Comprueba si el Nº no es decimal
function esInt(num)
{    
    if (num % 1 == 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

// Ocultar y mostrar la ayuda x pantalla
function ocultar(i)
{
    var auxp = document.getElementById("Ayuda"+i);

    if (auxp.style.display=="block")
    {
        auxp.style.display="none";
    }
    else
    {
        auxp.style.display="block";
    }
}

// Calculo con alerts & prompts [Método extra pinchando en la calculadora]
function Calculo2()
{
    var dni = prompt("Nº DNI");
    var noEsUnNumero = isNaN(dni);
    var letraDNI = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    if (dni == 0)
    {
        noEsUnNumero = true;
    }
    if(dni != null)
    {
        // Error ==> input no es un Nº
        if(noEsUnNumero == true)
        {
            alert("Error, please enter a valid email address");
        }
        // Si el input es un Nº...
        if(noEsUnNumero == false)
        {        
            var esNum = esInt(dni);

            // El input NO se sale de los límites && NO es decimal...
            if(dni >= 0 && dni <= 99999999 && esNum == true)
            {
                resultado = letraDNI[dni % 23];
                alert("Resultado = " + resultado);

                noEsUnNumero = true;
            }

            // Error ==> Input negativo || Nº Superior al permitido x los límites(Supuesto caso imposible pero lo registro igual)
            else
            {
                alert("Error, please enter a valid email address");                
                noEsUnNumero = true;
            }
        }
    }
}