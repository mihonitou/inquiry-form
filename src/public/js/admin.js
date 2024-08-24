flatpickr("#date", {
    locale: "ja",
    dateFormat: "Y/m/d",
    defaultDate: document.querySelector("#date").value || "today",
    onReady: function (selectedDates, dateStr, instance) {
        const customFooter = document.createElement("div");
        customFooter.style.display = "flex";
        customFooter.style.justifyContent = "space-between";
        customFooter.style.padding = "10px";

        const clearButton = document.createElement("span");
        clearButton.textContent = "削除";
        clearButton.style.color = "#007bff";
        clearButton.style.cursor = "pointer";
        clearButton.onclick = function () {
            instance.clear();
        };

        const todayButton = document.createElement("span");
        todayButton.textContent = "今日";
        todayButton.style.color = "#007bff";
        todayButton.style.cursor = "pointer";
        todayButton.onclick = function () {
            instance.setDate(new Date());
        };

        customFooter.appendChild(clearButton);
        customFooter.appendChild(todayButton);

        instance.calendarContainer.appendChild(customFooter);
    },
});


