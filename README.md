[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/WolframAlpha/functions?utm_source=RapidAPIGitHub_WolframAlphaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Wolfram|Alpha Package
Get search results from this computational knowledge engine
* Domain: [Wolfram|Alpha](http://www.wolframalpha.com/)
* Credentials: apiKey

## How to get credentials: 
1. Get apiKey from [Wolfram|Alpha](https://developer.wolframalpha.com/portal/myapps/)
 
## Wolfram|Alpha.createQuery
Create a query for Wolfram|Alpha

| Field       | Type  | Description
|-------------|-------|----------
| apiKey      | credentials| Application key
| input       | String| Search expression
| format      | String| The desired format for individual result pods. image, imagemap, plaintext, minput, moutput, cell, mathml, sound, wav
| includePodId| String| Return only one pod by its ID
| excludePodId| String| Return all pods except one by its ID
| podTitle    | Array | Selecting Pods by Title
| podIndex    | Array | Selecting Pods by Index
| scanner     | String| Selecting Pods by Scanner. Comma-separated

