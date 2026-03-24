class Encounters {

    getEncountersButton() {

        return document.getElementById("encounters");
    }

    getInputField() {

        return document.getElementsByClassName("encountersTextField")[0];
    }

    increaseEncountersButtonValue() {

        var inputField = this.getInputField();

        this.getEncountersButton().addEventListener("click", function() {

            inputField.value++;
        });
    }
}