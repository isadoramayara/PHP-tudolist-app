<div class="modal-content">

    <button class="fa-solid fa-x" onclick="hideModal()"></button>

    <h1>Adicionar Nova Atividade:</h1>
    
    <label for="item-form">

        <form class="add-item" id="item-form" 
        action="app/handlers/itemForm.php?lid=<?php echo $_GET['lid']?>" method="POST" autocomplete="off">

            <label for="itemName">Nome da atividade:</label>
                <input maxlength='35'  autocomplete="off" type="text" id="itemName" name="itemName">

            <label for="itemDescription">Descrição:</label>
                <textarea maxlength='300'  autocomplete="off" id="itemDescription" name="itemDescription"></textarea>

            <label for="itemProgression">Progresso:</label>
                <select name="itemProgression">
                    <option value="1">A fazer</option>
                    <option value="2">Sendo feita</option>
                    <option value="3">Finalizada</option>
                </select>

            <label><input type="submit" name="submitAdd" value="Adicionar novo item"></label>
        
        </form>

    </label>
</div>
