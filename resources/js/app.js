import "bootstrap";
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", function () {
    let table = new DataTable("#tableTemplate", {
        columnDefs: [
            { orderable: false, targets: "no-sort" },
            {
                targets: "render-ll",
                render: function (data, type, row) {
                    // Check if the data is longer than 30 characters
                    return data.length > 60
                        ? data.substring(0, 60) + "..."
                        : data;
                },
            },
        ],
        order: [],
    });

    table
        .on("order.dt search.dt", function () {
            let i = 1;

            table
                .cells(null, 0, { search: "applied", order: "applied" })
                .every(function (cell) {
                    this.data(i++);
                });
        })
        .draw();

    const toggleButton = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar");

    function toggleSidebar() {
        sidebar.classList.toggle("close");
        toggleButton.classList.toggle("rotate");

        closeAllSubMenus();
    }

    function toggleSubMenu(button) {
        if (!button.nextElementSibling.classList.contains("show")) {
            closeAllSubMenus();
        }

        button.nextElementSibling.classList.toggle("show");
        button.classList.toggle("rotate");

        if (sidebar.classList.contains("close")) {
            sidebar.classList.toggle("close");
            toggleButton.classList.toggle("rotate");
        }
    }

    function closeAllSubMenus() {
        Array.from(sidebar.getElementsByClassName("show")).forEach((ul) => {
            ul.classList.remove("show");
            ul.previousElementSibling.classList.remove("rotate");
        });
    }

    toggleButton.onclick = toggleSidebar;

    document.querySelectorAll(".dropdown-btn").forEach((button) => {
        button.addEventListener("click", function () {
            toggleSubMenu(button);
        });
    });

    $(document).on(
        "click",
        'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]',
        function (e) {
            e.preventDefault();
            let link = $(this).data("link");
            let modalSize = $(this).data("modal-size");
            // Reset any previous modal size class
            $("#modalTemplate").removeClass("modal-sm modal-lg modal-xl");
            if (modalSize) {
                $("#modalTemplate").addClass(modalSize);
            }
            $.ajax({
                url: link,
                type: "GET",
                success: function (response) {
                    // Populate the modal with the fetched view
                    $("#modalContent").html(response);
                    // Show the modal
                    var modal = new bootstrap.Modal(
                        document.getElementById("modalTemplate")
                    );
                    modal.show();
                },
                error: function () {
                    alert("An error occurred while loading the modal.");
                },
            });
        }
    );

    document.addEventListener("shown.bs.modal", function (event) {
        const modal = event.target; // The modal that triggered the event
        const featuredImageInput = modal.querySelector("#featured_image");
        const previewImage = modal.querySelector("#preview-image");

        if (featuredImageInput && previewImage) {
            // Add event listener to handle image preview
            featuredImageInput.addEventListener("change", function (event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Reset to placeholder if no file is selected
                    previewImage.src =
                        previewImage.getAttribute("data-placeholder");
                }
            });
        }
    });
});
