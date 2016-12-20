    //constructora

    function validador(){}

    //valida varias entradas de datos por medio de expresiones regulares
    function validaExp(quien, que) {
        var expMail = /^[a-zA-Z-_0-9][a-zA-Z-_0-9.]+@[a-zA-Z-_=>0-9.]+.[a-zA-Z]{2,3}$/;
        var expNumero = /^\d+$/;
        var expLetras = /^[a-zA-Z]$/;
        var expAlfaNum = /^[\w]+$/;
        var expRFC = /^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$/;
        var expCurp = /^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$/;
        if (quien.value != "") {
            if (que == "mail") {
                if (!expMail.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("El formato del mail es incorrecto ejemplo: correo1@miDominicio.com <br>");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html("");
                }
            } else if (que == "num") {
                if (!expNumero.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html(" Este campo solo puede contener dígitos [valor numérico]");
                    $(quien).css("box-shadow", "2px 2px 3px red");

                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html(""); 
                }
            } else if (que == "letra") {
                if (!expLetras.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("Este campo solo puede contener letras");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html("");
                }

            } else if (que == "alfaNum") {
                if (!expAlfaNum.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("Este campo solo puede contener valores alfanumeros [numeros y letras] <br>");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                     $(quien).next().html("");
                }
            } else if (que == "rfc") {
                if (!expRFC.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("El formato del RFC es incorrecto formato: [XXXX010101XXX]");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html("");
                }
            } else if (que == "curp") {
                if (!expCurp.test(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("El formato del CURP es incorrecto formato: [XXXX000000XXXXXX00]");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html(""); 
                }
            } else if (que == "alfaEsp") {
                var char = '';
                var validador = 1;
                for (var cont = 0; cont < quien.value.length; cont++) {
                    char = quien.value.toUpperCase().charCodeAt(cont);
                    console.log(char);
                    if ((char >= 65 && char <= 90) || (char >= 48 && char <= 57) || char == 32 || char == 46) {
                        validador *= 1;
                    } else {
                        validador *= 0;
                    }
                }
                if (validador == 0) {
                    quien.value = "";
                    $(quien).next().html("Este campo solo puede contener valores [letras,números y espacios]");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html("");
                }
            } else if (que == "fecha") {
                if (!validateMXDate(quien.value)) {
                    quien.value = "";
                    $(quien).next().html("El valor de la fecha es incorrecto formato: [dd/mm/aaaa]");
                    $(quien).css("box-shadow", "2px 2px 3px red");
                } else {
                    $(quien).css("box-shadow", "none");
                    $(quien).next().html("");
                }
            }
        }
    }

    // valida fechas en formaro dd-mm-aaaa
    function validateMXDate(strValue) {
        /************************************************
         DESCRIPTION: Validates that a string contains only
         valid dates with 2 digit month, 2 digit day,
         4 digit year. Date separator can be ., -, or /.
         Uses combination of regular expressions and
         string parsing to validate date.
         Ex. mm/dd/yyyy or mm-dd-yyyy or mm.dd.yyyy
         
         PARAMETERS:
         strValue - String to be tested for validity
         
         RETURNS:
         True if valid, otherwise false.
         
         REMARKS:
         Avoids some of the limitations of the Date.parse()
         method such as the date separator character.
         *************************************************/
        var objRegExp = /^\d{1,2}(\-|\/|\.)\d{1,2}\1\d{4}$/

        //check to see if in correct format
        if (!objRegExp.test(strValue))
            return false; //doesn't match pattern, bad date
        else {
            var strSeparator = strValue.substring(2, 3)
            var arrayDate = strValue.split(strSeparator);
            //create a lookup for months not equal to Feb.
            var arrayLookup = {'01': 31, '03': 31,
                '04': 30, '05': 31,
                '06': 30, '07': 31,
                '08': 31, '09': 30,
                '10': 31, '11': 30, '12': 31}
            var intDay = parseInt(arrayDate[0], 10);
            //check if month value and day value agree
            if (arrayLookup[arrayDate[1]] != null) {
                if (intDay <= arrayLookup[arrayDate[1]] && intDay != 0)
                    return true; //found in lookup table, good date
            }

            //check for February (bugfix 20050322)
            //bugfix  for parseInt kevin
            //bugfix  biss year  O.Jp Voutat
            var intMonth = parseInt(arrayDate[1], 10);
            if (intMonth == 2) {
                var intYear = parseInt(arrayDate[2]);
                if (intDay > 0 && intDay < 29) {
                    return true;
                } else if (intDay == 29) {
                    if ((intYear % 4 == 0) && (intYear % 100 != 0) ||
                            (intYear % 400 == 0)) {
                        // year div by 4 and ((not div by 100) or div by 400) ->ok
                        return true;
                    }
                }
            }
        }
        return false; //any other values, bad date
    }