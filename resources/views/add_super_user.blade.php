Email : <input type="email" id="email">
<button onclick="promoteToSuperUser()">promote to super user</button>

<script>
    function promoteToSuperUser()
    {
        var email = document.getElementById('email').value;
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200) {
                alert("success");
            }
            else if (this.readyState == 4)
            {
                alert("failed");
            }
        };

        xhttp.open("POST", "http://54.158.36.225:8000/user/promote_to_super_user/"+ email, true);
        xhttp.send();
    }
</script>
