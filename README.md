# TypTech Repository Viewer

Dies ist ein einfaches Webprojekt, das es dir ermöglicht, GitHub-Repositories anzuzeigen und deren `README.md`-Dateien im Markdown-Format zu rendern. Mit der GitHub API werden Informationen über die Repositories abgerufen und auf einer übersichtlichen Webseite dargestellt.

## Features

- Zeigt eine **Liste aller Repositories** eines GitHub-Benutzers an.
- Holt und rendert die **`README.md`-Dateien** jedes Repositories.
- Bietet eine **einfache Navigation** zum jeweiligen GitHub-Repository.

## 0. **Vorschau**
- Vorschau https://www.typtech.de/blog

## Voraussetzungen

Bevor du das Projekt ausführen kannst, stelle sicher, dass die folgenden Programme auf deinem Server oder PC installiert sind:

### 1. **PHP**

Das Projekt benötigt **PHP**. Falls du es noch nicht installiert hast, folge diesen Schritten:

- Auf einem Debian-basierten System (z. B. Ubuntu) kannst du PHP mit folgendem Befehl installieren:

    ```bash
    sudo apt update
    sudo apt install php8.0
    ```

- Überprüfe die Installation mit:

    ```bash
    php -v
    ```

    Du solltest die installierte PHP-Version sehen.

### 2. **Git**

Um das Repository herunterzuladen und zu verwalten, benötigst du **Git**. Falls Git noch nicht installiert ist, folge diesen Schritten:

- Installiere Git auf Debian-basierten Systemen:

    ```bash
    sudo apt install git
    ```

- Überprüfe die Installation mit:

    ```bash
    git --version
    ```

    Du solltest die Git-Version sehen.

### 3. **GitHub Personal Access Token**

Um mit der GitHub API zu kommunizieren, benötigst du ein **GitHub Personal Access Token**. Folge diesen Schritten, um ein Token zu erstellen:

1. Gehe zu [GitHub Tokens erstellen](https://github.com/settings/tokens?type=beta).
2. Klicke auf **Generate new token**.
3. Wähle die entsprechenden Berechtigungen aus (mindestens `repo`-Berechtigungen).
4. Kopiere das Token und füge es in den Code ein.

**Achtung:** Bewahre das Token sicher auf, da es nur einmal angezeigt wird.

## Installation

### 1. **Projekt herunterladen**

Klonen oder laden das Projekt von GitHub auf deinen Server oder PC:

```bash
git clone https://github.com/TypTech/Github-Repo-Blog.git
