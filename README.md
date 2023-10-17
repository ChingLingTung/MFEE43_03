# MFEE43_03

## Automatically Copy File to xampp/htdocs
Follow the steps to copy file to xampp/htdocs automatically.
1. Install **Command Runner (by @edonet)** and **multi command (by @ryuta46)**
2. Press *Ctrl + Shift + P*, type **Preferences: Open workspace settings (JSON)**
3. Paste the following code:
    ``` json
    {
        "multiCommand.commands": [
            {
                "command": "multiCommand.copyFile",
                "label": "Copy file to another location",
                "description": "copy the current $file to another root hard-coded destination, require 'command-runner' plugin.",
                "interval": 2,
                "sequence": [
                    "workbench.action.files.save",
                    {
                        "command": "command-runner.run",
                        "args": { "command": "cp \"${file}\" \"C:/xampp/htdocs/amusement-park/${relativeFile}\"" }
                    }
                ]
            }
        ],
        "workspaceKeybindings.myAwesomeTask.enabled": true
    }
    ```
4. Press *Ctrl + Shift + P*, type **Preferences: Open keyboard shortcuts (JSON)**
5. Paste the following code:
    ``` json
    // Place your key bindings in this file to override the defaults
    [
        {
            "key": "ctrl+s",
            "command": "extension.multiCommand.execute",
            "args": { 
                "command": "multiCommand.copyFile"
            },
            // "when": "editorTextFocus",
            "when": "config.workspaceKeybindings.myAwesomeTask.enabled"
        }
    ]
    ```
