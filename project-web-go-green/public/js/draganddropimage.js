document.addEventListener("DOMContentLoaded", function () {
    const dropArea = document.getElementById("drop-area");
    const fileInput = document.getElementById("fileInput");
    const imageContainer = document.getElementById("image-container");

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
    });

    // Remove highlight when item is dragged out of drop area
    ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    dropArea.addEventListener('drop', handleDrop, false);

    // Handle file input change
    fileInput.addEventListener('change', handleFiles, false);

    function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
    }

    function highlight() {
    dropArea.classList.add('highlight');
    }

    function unhighlight() {
    dropArea.classList.remove('highlight');
    }

    function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    handleFiles(files);
    }

    function handleFiles(files) {
        for (const file of files) {
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (allowedExtensions.test(file.name)) {
                const img = document.createElement("img");
                img.classList.add("img-thumbnail", "mx-2", "my-2");
                img.setAttribute("name", "image");
                img.file = file;
                imageContainer.appendChild(img);

                const reader = new FileReader();
                reader.onload = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);

                // Update the file input value
                const newFileInput = createNewFileInput(file);
                fileInput.parentNode.replaceChild(newFileInput, fileInput);
                fileInput = newFileInput;
            }
        }
    }

    function createNewFileInput(file) {
        const newFileInput = document.createElement("input");
        newFileInput.type = "file";
        newFileInput.id = "fileInput";
        newFileInput.name = "image"; // You may want to adjust the name attribute as needed
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        newFileInput.files = dataTransfer.files;
        newFileInput.style.display = "inline-block"; // Hide the new input
        return newFileInput;
    }
});
