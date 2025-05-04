<div>
    <button class="btn btn-primary" onclick="toggleTheme()">Toggle Theme</button>
</div>

<script>
    function toggleTheme() {
        const html = document.documentElement;
        const currentTheme = html.getAttribute("data-theme");
        const newTheme = currentTheme === "dracula" ? "fantasy" : "dracula";

        html.setAttribute("data-theme", newTheme);

        localStorage.setItem("theme", newTheme);
    }

    window.addEventListener("DOMContentLoaded", () => {
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme) {
            document.documentElement.setAttribute("data-theme", savedTheme);
        } else {
            document.documentElement.setAttribute("data-theme", "dracula");
        }
    });
</script>
