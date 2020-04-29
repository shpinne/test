<?php
    if(isPost()){
        $flashData = [
            'title' => 'Мы ответим Вам в ближайшее время',
            'message' => 'Письмо отправленно',
            'type' => 'success'
        ];
        $body = getRequest('body');
        $email = getRequest('email');

        $str = $email . "\n" . $body;

        if (!mail('a@a.com', 'Форма из сайта', $str)) {
            $flashData['message'] = 'Произошла ошибка';
            $flashData['type'] = 'error';
            $flashData['title'] = 'Неверно';
        }

        setFlash('sudo', $flashData);
        goBack();
    }
?>
<script>

</script>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Введите email">
    </div>
    <div class="form-group">
        <label for="body">Сообщение</label>
        <textarea placeholder="Введите свое сообщение" name="body" class="form-control" id="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>