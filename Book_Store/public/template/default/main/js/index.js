function getUrlVar(key){
    let result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
    return result && unescape(result[1]) || "";
}

$(document).ready(function(){
    let controller = (getUrlVar('controller') == '' ) ? 'index' : getUrlVar('controller');
    let action = (getUrlVar('action') == '') ? 'index' : getUrlVar('action');
    let classSelect = controller + '-' + action;
    console.log(classSelect)
    $('#menu ul li.' + classSelect).addClass('selected');
})