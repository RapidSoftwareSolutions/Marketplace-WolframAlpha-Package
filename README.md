[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/WolframAlpha/functions?utm_source=RapidAPIGitHub_WolframAlphaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Wolfram|Alpha Package
Get search results from this computational knowledge engine
* Domain: [Wolfram|Alpha](http://www.wolframalpha.com/)
* Credentials: apiKey

## How to get credentials: 
1. Get apiKey from [Wolfram|Alpha](https://developer.wolframalpha.com/portal/myapps/)
 
 
## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Wolfram|Alpha.createQuery
Create a query for Wolfram|Alpha

| Field       | Type  | Description
|-------------|-------|----------
| apiKey      | credentials| Application key
| input       | String| Search expression
| format      | Select| The desired format for individual result pods. image, imagemap, plaintext, minput, moutput, cell, mathml, sound, wav
| includePodId| String| Return only one pod by its ID
| excludePodId| String| Return all pods except one by its ID
| podTitle    | List  | Selecting Pods by Title
| podIndex    | List  | Selecting Pods by Index
| scanner     | List | Selecting Pods by Scanner

