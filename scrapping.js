
var arr = $("table.gray12 td a");
for( var i = 0; i < arr.length; i++){
var kk = arr.eq(i);
var func = kk.attr("onclick");
var arrPar = func.split(",");
var cnameGroup = arrPar[1];
var cname = cnameGroup.split("'").join("").replace(")", "");
console.log(cname);
}