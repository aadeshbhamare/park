document.getElementById("area").addEventListener("change", function () {
  const area = this.value;
  const date = document.getElementById("datetime").value;

  fetch(`check_availability.php?area=${area}&date=${date}`)
    .then(response => response.json())
    .then(data => {
      if (data.available > 0) {
        document.getElementById("status").innerText = `✅ ${data.available} slots available`;
      } else {
        document.getElementById("status").innerText = `❌ No slots available`;
        // optionally disable submit button
      }
    });
});
