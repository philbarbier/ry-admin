<div>
    <?php if (isset($message)) { echo '<p class="information">' . $message . '</p>'; } ?>
    Add a submission:
    <form action="/home/add_submission" method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" placeholder="First name" />
        <br />
        <input type="text" name="lastname" placeholder="Last name" />
        <br />
        <input type="text" name="school" placeholder="School" />
        <br />
        <input type="file" name="uploadfile" />
        <br />
        <textarea name="biotext" placeholder="Artist biography"></textarea>
        <br />
        <input type="text" name="email" placeholder="user@domain.tld" />
        <br />
        <input type="submit" class="btn" value="Submit" />
    </form>
</div>
