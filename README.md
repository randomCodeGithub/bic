# Dependencies

This is a child theme of PandaGo3.

# Setup

To start working with this theme do the following:

- Change the theme folders name to your projects name, e.g. *pandago3-child* to *your-project*
- Open style.css file and change Theme Name from PandaGo3 Child to your projects name, e.g. PandaGo3 Child to Your Project
- In terminal navigate to *your-project/webpack* and run the command `npm install`, then wait for installation to complete.
- After the installation is complete, from the same location, run command `npm run watch`. Script will be watching for any file changes in *your-project/webpack/src* folder and compile them all at runtime to *your-project/assets* folder.

# Working with assets

Work with CSS and JS files is done inside *your-project/webpack/src* folder.

- fonts - Put font related files here. Everything from this folder will be copied to *your-project/assets/fonts* folder.
- img - Put any images related to your theme which are needed for CSS or JS here. Just like with fonts folder, everything will be copied over to *your-project/assets/img* folder.
- js - Everything inside main.js file will be included in every page, so functions that are needed on every or most of the pages should go here. If you want to add another file besides main.js, you have to reference it inside *your-project/awebpack/src/index.js* file. Output of this file is generated at *your-project/assets/main.js*.
- scss - Everything inside this folder will be compiled and the output will be in *your-project/assets/main.css*. Inside *main.scss* you can setup variables as needed for your project.
- vendor - Everything inside this folder will be copied to *your-project/assets/vendor* folder. You can use this to store additional jQuery plugins or write styles or scripts that are not needed on every page and can be included conditionally.

# Working with files

There is a predefined folder structure in this theme.

- blocks - In this folder keep only block related folders and files. If you're using "Generate Block" function all files and folders will be placed inside this *your-project/blocks/block-name* folder.
- includes - Folder where functional code should reside. Each file that is inside this folder by default has a short description at the top to outline files purpose.
- partials - Folder where various template parts should be placed which can be reused elsewhere.
- templates - Folder where page templates are located if there are any in your project.



That's it. Happy coding!