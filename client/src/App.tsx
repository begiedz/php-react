import { useEffect, useState } from "react"

interface ApiResponse {
  id: number;
  message: string;
}

function App() {
  const [response, setResonse] = useState<Array<ApiResponse> | null>(null)

  useEffect(() => {
    // console.log("fetching http://localhost/api/...")
    fetch('http://localhost/api/')
      .then(res => res.json())
      .then(data => setResonse(data))
      .catch(err => console.error(err))
  }, [])

  useEffect(() => {
    console.log(response);
  }, [response])

  return (
    <>
      <h1>PHP response:</h1>
      <ul>{response ? response.map((message) => {
        return <li key={message.id}>{message.message}</li>
      }) :
        <li>no records</li>}
      </ul>
    </>
  )
}

export default App
