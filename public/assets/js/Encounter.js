class Encounters {

    getEncountersButton() {

        return document.getElementById("encounters");
    }

    increaseEncountersButtonValue() {

        this.getEncountersButton().addEventListener("click", function() {

            this.nextElementSibling.value++;
        });
    }
}