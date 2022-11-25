<form action="sms" method="POST">
        @csrf
    <input type="text" name='numbers'><br>
    <textarea name="message" id="" cols="30" rows="10"></textarea><br>
<input type="submit">
</form>