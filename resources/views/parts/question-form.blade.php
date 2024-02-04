<div id="question-form" class="question-form__backdrop">
    <div class="question-form__box">
        <h3>У меня вопрос</h3>
        <form action="/" method="POST">
            <div>
                <label for="qi-name">Представьтесь</label>
                <input type="text" name="name" value="" id="qi-name">
            </div>
            <div>
                <label for="qi-phone">Ваш телефон</label>
                <input type="text" name="phone" value="" id="qi-phone">
            </div>
            <div>
                <label for="qi-question">Ваш вопрос</label>
                <textarea name="question" id="qi-question"></textarea>
            </div>
            <div class="checkbox-q">
                <input type="checkbox" name="agree" id="qi-agree">
                <label for="qi-agree">я&nbsp;согласен на&nbsp;обработку персональных данных в&nbsp;соответствии с&nbsp;политикой конфиденциальности</label>
            </div>
            <div class="recapt"></div>
            <input type="submit" value="Отправить" id="qi-submit">
        </form>
        <div id="x-close" class="x-close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23 20.168l-8.185-8.187 8.185-8.174-2.832-2.807-8.182 8.179-8.176-8.179-2.81 2.81 8.186 8.196-8.186 8.184 2.81 2.81 8.203-8.192 8.18 8.192z"/></svg></div>
    </div>
</div>