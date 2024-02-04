<div class="modal fade modal_form" id="btn-recommendation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3>Получить рекомендацию</h3>
            </div>
            <div class="modal-body">
                <p class="backrec">Рекомендация отправлена. Проверьте почту</p>
                <form id="recommendation" class="send_form" action="/send_recommendation">
                    {{csrf_field()}}
                    <div class="input-group">
                        <label>Представьтесь</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="input-group">
                        <label>Ваш e-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="recapt" data-size="compact" style="height:74px;margin:20px 0"></div>

                    <div class="pure-checkbox">
                        <input  required id="checkbox_recommendation" name="checkbox" type="checkbox" checked>
                        <label for="checkbox_recommendation">Я согласен на обработку персональной информации в соответствии с
                            <a target="_blank" href="/docs/politics.pdf">Политикой конфиденциальности</a></label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="submitBtn_recommendation" type="submit" form="recommendation" class="btn purple">Отправить</button>
                <button type="button" id="btn-send_close" data-form = "call_back" data-dismiss="modal" class="btn purple btn-send_close">Ок</button>
            </div>
        </div>
    </div>
</div>