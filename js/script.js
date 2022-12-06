function hamdk(){
    var sdt=document.getElementById('sdt');
    var sdtreg=/^[0-9]{10}$/;
    if(sdtreg.test(sdt.value)==false){
        alert("Số điện thoại không hợp lệ!");
        return false;
    }
    var emailreg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(emailreg.test(document.getElementById('email').value)==false){
        alert("Email không hợp lệ!");
        return false;
    }
    if(document.getElementById('mk').value.length<8){
        alert("Mật khẩu phải lớn hơn 8 ký tự!")
        return false;
    }
    if(document.getElementById('nlmk').value != document.getElementById('mk').value){
        alert("Mật khẩu nhập lại không khớp!");
        return false;
    }
    alert("Đăng ký thành công!");
    return true;
}
var fulltime=new Date("December 7,2022 00:00:00").getTime();
        setInterval( function() {
            var nowdate=new Date().getTime();
            var D=fulltime-nowdate;
            var hour=Math.floor(D/(1000*60*60));
            var minute=Math.floor(D/(1000*60));
            var second=Math.floor(D/1000)
            hour %=24;
            minute %=60;
            second %=60;
            if(hour<10){
                document.getElementById('hour').innerText='0'+hour+':';
            }
            else{
                document.getElementById('hour').innerText=hour+':';
            }
            if(minute<10){
                document.getElementById('minute').innerText='0'+minute+':';
            }
            else{
                document.getElementById('minute').innerText=minute+':';
            }
            if(second<10){
                document.getElementById('second').innerText='0'+second;
            }
            else{
                document.getElementById('second').innerText=second;
            }
        },1000)