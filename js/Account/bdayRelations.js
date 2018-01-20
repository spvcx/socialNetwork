var relationStatus = document.getElementById('relations');
if (relationStatus !== null) {
    var currentStatus = relationStatus.value;
    for (let i = 1; i < relationStatus.length; i++) {
        if (currentStatus === relationStatus[i].value) {
            let option = document.getElementById(i);
            relationStatus.removeChild(option);
        }
    }
}