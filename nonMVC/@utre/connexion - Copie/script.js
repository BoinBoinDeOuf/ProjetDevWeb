document.getElementById('competitionType').addEventListener('change', function() {
    const type = this.value;
    const additionalFields = document.getElementById('additionalFields');
    additionalFields.innerHTML = ''; // Clear previous fields

    if (type === 'type1') {
        additionalFields.innerHTML = `
            <label for="field1">Champ supplémentaire 1 :</label>
            <input type="text" id="field1" name="field1">
        `;
    } else if (type === 'type2') {
        additionalFields.innerHTML = `
            <label for="field2">Champ supplémentaire 2 :</label>
            <input type="text" id="field2" name="field2">
            <label for="field3">Champ supplémentaire 3 :</label>
            <input type="text" id="field3" name="field3">
        `;
    } else if (type === 'type3') {
        additionalFields.innerHTML = `
            <label for="field4">Champ supplémentaire 4 :</label>
            <input type="text" id="field4" name="field4">
            <label for="field5">Champ supplémentaire 5 :</label>
            <input type="text" id="field5" name="field5">
            <label for="field6">Champ supplémentaire 6 :</label>
            <input type="text" id="field6" name="field6">
        `;
    }
});
