# TheFestival
# Working with git from terminal

For every interaction with the app **create a new branch (-b)** with proper name starting with feature(orderOfIssue)/(properName): 

      git checkout -b feature01/projectSetUp
  
For **pulling new changes** from repository (preferably from master branch):

      git fetch --all
      git pull
  
for **pushing new changes** to the repository:
  
      git add .
      git commit -m "short description of changes"
      git push -u origin (name of branch you want to push) 
      
      // that will create a pull request, which we will merge in github api
  
for **switching between branche**s:

     git checkout (name of the branch you want to switch to)`     
  
  a
