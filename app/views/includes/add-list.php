<div class="modal-content">

    <button class="fa-solid fa-x deactivemodal" onclick="hideModal()"></button>

    <h1>Adicionar Nova Lista:</h1>
    
    <label for="list-form">

        <form class="add-list" id="item-form" action="app/handlers/listForm.php" method="POST" autocomplete="off">

            <label for="listName">Nome da lista:</label>
                <input maxlength="23" autocomplete="off" type="text" id="listName" name="listName">

            <label for="itemDescription">Descrição:</label>
                <textarea maxlength="160" autocomplete="off" name="listDescription"></textarea>

            <label><input type="submit" name="submitAdd" value="Adicionar nova lista"></label>
        
        </form>

    </label>
</div>
