<div class="modal fade" id="editModal<?= $person['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?= $person['id'] ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./vendor/update.php?id=<?= $person['id'] ?>&user_id=<?=$person['user_id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="text" placeholder="Сообщение">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>