<!-- The Modal -->
<div id="id03" class="modal">
	<form class="modal-content animate" action="/controllers/action_reply.php" method="post" id="replyForm">
		<div class="container">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user["id"];?>">
            <input type="hidden" name="review_id" id="review_id" value="">
			<label>Reply</label><br>
            <textarea rows="5" cols="75" name="body" maxlength="255" id="body" required></textarea>
			<button type="submit" class="savebtn">Save</button>
        </div>

		<div class="container">
			<button type="button" onclick="$('#id03').hide()" class="cancelbtn">Cancel</button>
		</div>
	</form>
</div>