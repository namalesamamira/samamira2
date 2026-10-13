let args = process.argv;
args.splice(0,2); //remove the first 2 items (node new_project.js) in the array

let str = args.join(" ");
console.log(str);
