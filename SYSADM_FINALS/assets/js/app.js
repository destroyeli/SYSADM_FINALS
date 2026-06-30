console.log("Employee Management System Loaded");
// Auto-format Philippine phone number

document.addEventListener("DOMContentLoaded", function () {
  const phone = document.getElementById("phone");

  if (!phone) return;

  phone.addEventListener("input", function () {
    let value = this.value.replace(/\D/g, "");

    if (value.length > 11) {
      value = value.substring(0, 11);
    }

    let formatted = "";

    if (value.length > 0) {
      formatted = value.substring(0, 4);
    }

    if (value.length >= 5) {
      formatted += " " + value.substring(4, 7);
    }

    if (value.length >= 8) {
      formatted += " " + value.substring(7, 11);
    }

    this.value = formatted;
  });
});
